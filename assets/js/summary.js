var Summary = {

	init: function() {
		setTimeout(Summary.initEvents, 1);
	},

	initEvents: function() {

		// Talent specializations
		$('#profile-info-spec').mouseover(function() {

			var $tooltip = $('<ul/>');

			function appendTreeLine(title, $source) {

				var isActiveSpec = $source.is('.active');

				var $line = $('<li/>').addClass(isActiveSpec ? 'color-tooltip-yellow' : 'color-q0');

				$line.append(title + ' ');
				$('<strong>').text($('span.name', $source).text()).appendTo($line);

				if(isActiveSpec) {
					$line.append(' ' + String.fromCharCode(8211) + ' ' + MsgSummary.talents.specTooltip.active);
				}

				$tooltip.append($line);
			}

			$('<li/>').append($('<h3/>').text(MsgSummary.talents.specTooltip.title)).appendTo($tooltip);

			var $talents = $('#summary-talents');

			appendTreeLine(MsgSummary.talents.specTooltip.primary,   $('a.spec-0'), $talents);
			appendTreeLine(MsgSummary.talents.specTooltip.secondary, $('a.spec-1'), $talents);

			Tooltip.show(this, $tooltip);
		});

		// View options
		$('#profile-view-options-summary').delegate('a', 'click', function() {
			var viewName = ($(this).attr('class'));
			if(viewName.indexOf('disabled') != -1) {
				return;
			}
			Cookie.create('wow.character.summary.view', viewName, { path: Core.baseUrl + '/character/', expires: 720 }); // 30 days
		});

		// Audit "What is this"
		$('#summary-audit-whatisthis').mouseover(function() {
			Tooltip.show(this, Wow.createSimpleTooltip($('#summary-audit h3').text(), MsgSummary.audit.whatIsThis));
		});

		// Statistics
		$('#summary-stats-simple-arrow-right').click(function() {
			var $this = $(this);
			var $current = $this.siblings('div.summary-stats-column:visible');
			var $next = $current.next('div.summary-stats-column');
			if($next.length == 0) {
				$next = $this.siblings('div.summary-stats-column:first');				
			}
			$current.hide();
			$next.show();
		});

		// Statistics
		$('#summary-stats-simple-arrow-left').click(function() {
			var $this = $(this);
			var $current = $this.siblings('div.summary-stats-column:visible');
			var $previous = $current.prev('div.summary-stats-column');
			if($previous.length == 0) {
				$previous = $this.siblings('div.summary-stats-column:last');
			}
			$current.hide();
			$previous.show();
		});

		$('#summary-stats-toggler').click(function() {

			var $simple = $('#summary-stats-simple');
			var $advanced = $('#summary-stats-advanced');
			var $toggler = $('span.arrow', this);

			if($advanced.is(':visible')) {
				$advanced.hide();
				$simple.show();
				$toggler.text(MsgSummary.stats.toggle.core);
				$toggler.parent().addClass('expanded');
			} else {
				$advanced.show();
				$simple.hide();
				$toggler.text(MsgSummary.stats.toggle.all);
				$toggler.parent().removeClass('expanded');
			}
		});

		// Recent activity
		$('#profile-recentactivity-rss').mouseover(function() {
			Tooltip.show(this, MsgSummary.recentActivity.subscribe);
		});

		// Tools button (sidebar)
		$('#summary-link-tools')
		.mouseout(ContextMenu.delayedHide)
		.mouseover(function() {

			var list = $('<ul/>');

			// Title
			$('<li/>')
			.addClass('divider')
			.html('<span>' + MsgSummary.links.tools + '</span>')
			.appendTo(list);

			// Save Character Image
			var url = $('#profile-wrapper').css('background-image');
			url = url.replace(/^url\(('|")?/, ''); // Remove leading url("
			url = url.replace(/('|")?\)$/, '');    // Remove trailing ")

			$('<li/>').append(
				$('<a />', {
					text: MsgSummary.links.saveImage,
					href: url
				})
			)
			.appendTo(list);

			ContextMenu.show(this, list);
		});

	},

	createItemListTooltip: function(items) {

		items.sort(function(a, b) {
			// Quality DESC, Name ASC
			var cmp = b.quality - a.quality;
			if(cmp != 0) {
				return cmp;
			}
			return a.name.localeCompare(b.name);
		});

		var $tooltip = $('<ul />').addClass('summary-item-list');

		$.each(items, function() {
			$('<li/>').append(
				$('<span/>').addClass('icon').append(Wow.Icon.framedIcon(this.icon, 12))
			)
			.append(
				$('<span/>').addClass('description color-q' + this.quality).text(this.name)
			)
			.appendTo($tooltip);
		});
		return $tooltip;
	}
};

$(document).ready(Summary.init);

Summary.Inventory = function(options, data) {

	// Variables
	var self = this;
	Summary.Inventory.instance = self;

		// State
		var highlightedSlotIds;

		// DOM nodes
		var $inventory;
		var $slotsById = {};

	// Constructor
	init();

	// Public functions
	self.highlightSlots = highlightSlots;

	self.removeHighlighting = removeHighlighting;

	self.getItemsBySlotIds = function(slotIds) {
		var result = [];
		$.each(slotIds, function() {
			result.push(data[this]);
		});
		return result;
	}

	// Private functions
	function init() {

		$inventory = $('#summary-inventory');

		setTimeout(initHtml, 1);
		setTimeout(initEvents, 1);
	}

	function initHtml() {
		$inventory.children('div.slot').each(function() {
			$slotsById[getSlotIdFromSlot(this)] = $(this);
		});
	}

	function initEvents() {

		$inventory.delegate('a.empty', 'mouseover', emptySlotMouseOver);
		if(options.view == 'advanced') {
			$inventory.delegate('a.audit-warning', 'mouseover', slotAuditMouseOver);
			$inventory.delegate('a.audit-warning', 'mouseout',  removeHighlighting);
		}
	}

	function highlightSlots(slotIds) {

		self.removeHighlighting();

		$.each(slotIds, function() {
			$slotsById[this].addClass('slot-highlight');
		});
		highlightedSlotIds = slotIds;
	}

	function removeHighlighting() {

		if(highlightedSlotIds == null) {
			return;
		}

		$.each(highlightedSlotIds, function() {
			$slotsById[this].removeClass('slot-highlight');
		});

		highlightedSlotIds = null;
	}

	// Event handlers
	function emptySlotMouseOver() {

		var slotName = MsgSummary.inventory.slots[getSlotTypeFromSlot(this.parentNode.parentNode.parentNode)];

		Tooltip.show(this, Wow.createSimpleTooltip(slotName, MsgSummary.inventory.slots.empty));
	}

	function slotAuditMouseOver() {

		var slotId = getSlotIdFromSlot(this.parentNode.parentNode.parentNode.parentNode.parentNode);

		//highlightSlots([slotId]);

		var $tooltip = $('<ul/>').addClass('color-tooltip-yellow');

		var audit = Summary.Audit.instance.getData();
		var enchanterEnchantAvailable = !!(audit.missingEnchanterEnchants && audit.missingEnchanterEnchants[slotId]);

		var $ul = $('<ul/>').addClass('summary-audit-list');

		// Enchant
		if(audit.unenchantedItems && audit.unenchantedItems[slotId] && !enchanterEnchantAvailable) {
			$('<li/>').text(MsgSummary.audit.enchants.tooltip).appendTo($ul);
		}

		// Empty sockets
		if(audit.itemsWithEmptySockets) {
			var nEmptySockets = audit.itemsWithEmptySockets[slotId];
			if(nEmptySockets > 0) {
				$('<li/>').text(nEmptySockets + ' ' + (nEmptySockets == 1 ? MsgSummary.audit.sockets.singular : MsgSummary.audit.sockets.plural)).appendTo($ul);
			}
		}

		// Non-optimal armor
		if(audit.inappropriateArmorItems && audit.inappropriateArmorItems[slotId]) {
			$('<li/>').text(Core.msg(MsgSummary.audit.armor.tooltip, MsgSummary.audit.armor[audit.appropriateArmorType])).appendTo($ul);
		}

		// Low level items
		if(audit.lowLevelItems && audit.lowLevelItems[slotId]) {
			$('<li/>').text(MsgSummary.audit.lowLevel.tooltip).appendTo($ul);
		}

		// Missing belt buckle
		if(audit.missingExtraSockets && audit.missingExtraSockets[slotId] && audit.recommendedBeltBuckleName) {
			$('<li/>').append(Core.msg(MsgSummary.audit.missing, '<span class="color-q' + audit.recommendedBeltBuckleQualityId + '">' + audit.recommendedBeltBuckleName + '</span>')).appendTo($ul);
		}

		// Blacksmithing
		if(audit.missingBlacksmithSockets && audit.missingBlacksmithSockets[slotId]) {
			$('<li/>').append($('<span/>').addClass('icon').append(Wow.Icon.framedIcon('trade_blacksmithing', 12))).append($('<span/>').text(Core.msg(Msg.grammar.colon, MsgSummary.audit.blacksmithing.name) + ' ' + MsgSummary.audit.blacksmithing.tooltip)).appendTo($ul);
		}

		// Enchanting
		if(enchanterEnchantAvailable) {
			$('<li/>').append($('<span/>').addClass('icon').append(Wow.Icon.framedIcon('trade_engraving', 12))).append($('<span/>').text(Core.msg(Msg.grammar.colon, MsgSummary.audit.enchanting.name) + ' ' + MsgSummary.audit.enchanting.tooltip)).appendTo($ul);
		}

		// Engineering
		if(audit.missingEngineerEnchants && audit.missingEngineerEnchants[slotId]) {
			$('<li/>').append($('<span/>').addClass('icon').append(Wow.Icon.framedIcon('trade_engineering', 12))).append($('<span/>').text(Core.msg(Msg.grammar.colon, MsgSummary.audit.engineering.name) + ' ' + MsgSummary.audit.engineering.tooltip)).appendTo($ul);
		}

		// Inscription
		if(audit.missingScribeEnchants && audit.missingScribeEnchants[slotId]) {
			$('<li/>').append($('<span/>').addClass('icon').append(Wow.Icon.framedIcon('inv_inscription_tradeskill01', 12))).append($('<span/>').text(Core.msg(Msg.grammar.colon, MsgSummary.audit.inscription.name) + ' ' + MsgSummary.audit.inscription.tooltip)).appendTo($ul);
		}

		// Leatherworking
		if(audit.missingLeatherworkerEnchants && audit.missingLeatherworkerEnchants[slotId]) {
			$('<li/>').append($('<span/>').addClass('icon').append(Wow.Icon.framedIcon('inv_misc_armorkit_17', 12))).append($('<span/>').text(Core.msg(Msg.grammar.colon, MsgSummary.audit.leatherworking.name) + ' ' + MsgSummary.audit.leatherworking.tooltip)).appendTo($ul);
		}

		$ul.appendTo($tooltip);

		Tooltip.show(this, $tooltip);
	}

	// Utilities
	function getSlotIdFromSlot(slot) {
		return $(slot).attr('data-id');
	}

	function getSlotTypeFromSlot(slot) {
		return $(slot).attr('data-type');
	}
};

Summary.Audit = function(data) {

	// Variables
	var self = this;
	Summary.Audit.instance = self;

	// Constructor
	init();

	// Public functions
	self.getData = function() {
		return data;
	}

	// Private functions
	function init() {
		setTimeout(initEvents, 1);
	}

	function initEvents() {

		var $audit = $('#summary-audit');

		var $auditList = $audit.find('ul');
		$auditList.delegate('span.tip', 'mouseover', lineMouseOver);
		$auditList.delegate('span.tip', 'mouseout',  lineMouseOut);
	}

	// Event handlers
	function lineMouseOver() {

		var slotIds = getSlotIdsFromSpan(this);
		if(slotIds == null) {
			return;
		}

		Summary.Inventory.instance.highlightSlots(slotIds);

		var highlightedItems = Summary.Inventory.instance.getItemsBySlotIds(slotIds);
		var $tooltip = Summary.createItemListTooltip(highlightedItems);
		Tooltip.show(this, $tooltip);
	}

	function lineMouseOut() {

		Summary.Inventory.instance.removeHighlighting();
	}

	// Utilities
	function getSlotIdsFromSpan(span) {

		var slots = $(span).parent().attr('data-slots');
		if(slots) {
			return slots.split(',');
		}
	}
};

Summary.Reforging = function() {

	// Variables
	var self = this;

	// DOM nodes
	var $reforging;
	var $reductionLinesByStatId = {};
	var $increaseLinesByStatId = {};

	// State
	var $highlightedLines;

	// Constructor
	init();

	// Private functions
	function init() {

		$reforging = $('#summary-reforging')

		setTimeout(initHtml, 1);
		setTimeout(initEvents, 1);
	}

	function initHtml() {

		var $line;

		$reforging
		.find('ul.reductions li').each(function() {
			$line = $(this);
			$line.reduction = true;
			$reductionLinesByStatId[getStatIdFromLine(this)] = $line;

		}).end()
		.find('ul.increases li').each(function() {
			$line = $(this);
			$line.reduction = false;
			$increaseLinesByStatId[getStatIdFromLine(this)] = $line;
		});
	}

	function initEvents() {

		$reforging
		.delegate('li', 'mouseover', lineMouseOver)
		.delegate('li', 'mouseout',  lineMouseOut);
	}

	function highlight(reductionLines, increaseLines) {
		$highlightedLines = [];
		highlightLines(reductionLines, $reductionLinesByStatId);
		highlightLines(increaseLines,  $increaseLinesByStatId);
		$reforging.addClass('reforging-highlight');
	}

	function highlightLines(statIds, $linesByStatId) {

		if($.isPlainObject(statIds)) { 
			$.each(statIds, function(statId, amount) {
				highlightLine($linesByStatId[statId], amount);
			});
		} else {
			var statId = statIds;
			highlightLine($linesByStatId[statId]);
		}
	}

	function highlightLine($line, amount) {

		if(!$line.arrowed) {
			$('<div/>').addClass('arrow').prependTo($line);
			$line.arrowed = true;
		}

		$line.addClass('highlight');
		$highlightedLines.push($line);

		if(amount > 0) {
			updateLineText($line, amount);
		}
	}

	function updateLineText($line, amount) {
		var $value = $line.find('span.value');
		$line.previousValue = Math.abs(parseInt($value.text()));
		$value.text(($line.reduction ? '-' : '+') + amount);
	}

	function removeHighlighting() {

		if($highlightedLines == null) {
			return;
		}

		var $line;
		$.each($highlightedLines, function() {
			$line = this;
			$line.removeClass('highlight');
			if($line.previousValue > 0) {
				updateLineText($line, $line.previousValue);
				$line.previousValue = null;
			}
		});
		$highlightedLines = null;
		$reforging.removeClass('reforging-highlight');
	}

	// Event handlers
	function lineMouseOver() {
		var $this = $(this);

		var reduction = ($this.parent().hasClass('reductions'));
		if(reduction) {
			highlight(getStatIdFromLine(this), getSourcesFromLine(this));
		} else {
			highlight(getSourcesFromLine(this), getStatIdFromLine(this));
		}
	}

	function lineMouseOut() {
		removeHighlighting();
	}

	// Utilities
	function getStatIdFromLine(li) {
		return $(li).data('stat'); // number
	}

	function getSourcesFromLine(li) {
		return $(li).data('sources'); // json
	}
};

Summary.Stats = function(data) {

	// Variables
	var self = this;

	// Constants
	var TEMPLATE_RANGE = '{0} - {1}';
	var TEMPLATE_MULTIVALUE = '{0} / {1}';
	var PERCENT_DECIMALS = 2;
	var SPEED_DECIMALS = 2;
	var DPS_DECIMALS = 1;
	var DAMAGE_DECIMALS = 0;
	var ATTACK_POWER_MAGIC_NUMBER = 14;

	// Tooltips
	var statTooltips = {

		// Misc.
		averageilvl: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.averageItemLevel.title, data.averageItemLevelBest) + '</h3>',
				MsgSummary.stats.averageItemLevel.description
			];
		},

		// Health
		health: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.health.title, data.health) + '</h3>',
				MsgSummary.stats.health.description
			];
		},

		// Power
		'power-0': function() { // Mana
			return [
				'<h3>' + Core.msg(MsgSummary.stats.mana.title, data.power) + '</h3>',
				MsgSummary.stats.mana.description
			];
		},
		'power-1': function() { // Rage
			return [
				'<h3>' + Core.msg(MsgSummary.stats.rage.title, data.power) + '</h3>',
				MsgSummary.stats.rage.description
			];
		},
		'power-2': function() { // Focus
			return [
				'<h3>' + Core.msg(MsgSummary.stats.focus.title, data.power) + '</h3>',
				MsgSummary.stats.focus.description
			];
		},
		'power-3': function() { // Energy
			return [
				'<h3>' + Core.msg(MsgSummary.stats.energy.title, data.power) + '</h3>',
				MsgSummary.stats.energy.description
			];
		},
		'power-6': function() { // Runic
			return [
				'<h3>' + Core.msg(MsgSummary.stats.runic.title, data.power) + '</h3>',
				MsgSummary.stats.runic.description
			];
		},

		// Base
		strength: function() {
			var res = ['<h3>' + Core.msg(MsgSummary.stats.strength.title, data.strTotal) + tooltipBaseStatBonusText(data.strBase, data.strTotal) + '</h3>'];
			if(data.str_ap > 0)
				res.push(Core.msg(MsgSummary.stats.increases.attackPower, data.str_ap));
			return res;
		},
		agility: function() {
			var res = ['<h3>' + Core.msg(MsgSummary.stats.agility.title, data.agiTotal) + tooltipBaseStatBonusText(data.agiBase, data.agiTotal) + '</h3>'];
			if(data.agi_ap > 0)
				res.push(Core.msg(MsgSummary.stats.increases.attackPower, data.agi_ap));
			if(data.agi_crit > 0)
				res.push(Core.msg(MsgSummary.stats.increases.critChance, data.agi_crit.toFixed(PERCENT_DECIMALS)));
			return res;
		},
		stamina: function() {
			var res = ['<h3>' + Core.msg(MsgSummary.stats.stamina.title, data.staTotal) + tooltipBaseStatBonusText(data.staBase, data.staTotal) + '</h3>'];
			if(data.sta_hp > 0) {
				res.push(Core.msg(MsgSummary.stats.increases.health, data.sta_hp));
			}
			return res;
		},
		intellect: function() {
			var res = ['<h3>' + Core.msg(MsgSummary.stats.intellect.title, data.intTotal) + tooltipBaseStatBonusText(data.intBase, data.intTotal) + '</h3>'];
			if(data.int_sp > 0 || data.int_crit > 0) {
				res.push(Core.msg(MsgSummary.stats.increases.spellPower, data.int_sp));
				res.push(Core.msg(MsgSummary.stats.increases.spellCritChance, data.int_crit.toFixed(PERCENT_DECIMALS)));
			} else {
				res.push(Core.msg('<span class="color-q0">' + MsgSummary.stats.noBenefits + '</span>'));
			}
			return res;
		},
		spirit: function() {
			var res = ['<h3>' + Core.msg(MsgSummary.stats.spirit.title, data.sprTotal) + tooltipBaseStatBonusText(data.sprBase, data.sprTotal) + '</h3>'];
			if(data.spr_regen > 0) {
				res.push(Core.msg(MsgSummary.stats.increases.manaRegen, data.spr_regen));
			} else {
				res.push(Core.msg('<span class="color-q0">' + MsgSummary.stats.noBenefits + '</span>'));
			}
			return res;
		},
		mastery: function() {
			var res = [
				'<h3>' + Core.msg(MsgSummary.stats.mastery.title, data.mastery.toFixed(2)) + '%' +
                    tooltipBaseStatBonusTextPercent(data.masteryBase, data.mastery) +
                    '</h3>'
			];

			var masteryKnown = !!(data.masteryName && data.masteryDescription);
			var specced = $('#profile-info-spec').length > 0;

			if(masteryKnown && specced) {
				res.push('<h3 class="color-q1">' + data.masteryName + '</h3>');
				res.push(data.masteryDescription);
			} else {
				if(specced) {
					res.push('<span class="color-q0">' + MsgSummary.stats.mastery.unknown + '</span>');
				} else {
					res.push('<span class="color-q0">' + MsgSummary.stats.mastery.unspecced + '</span>');
				}
			}

            res.push('<br />' + Core.msg(MsgSummary.stats.mastery.description, data.masteryRating, data.masteryRatingBonus.toFixed(2)));
			return res;
		},

		// Melee
		meleedamage: function() {
			var res = ['<h3>' + MsgSummary.inventory.slots[21] + '</h3>'];
			tooltipDamageDetails(res, data.dmgMainSpeed, data.dmgMainMin, data.dmgMainMax, data.dmgMainDps);
			if(data.hasOffhandWeapon) {
				res.push('<br /><h3 class="color-q1">' + MsgSummary.inventory.slots[22] + '</h3>');
				tooltipDamageDetails(res, data.dmgOffSpeed, data.dmgOffMin, data.dmgOffMax, data.dmgOffDps);
			}
			return res;
		},
		meleedps: function() {
			return [
				'<h3>' + MsgSummary.stats.meleeDps.title + '</h3>'
			];
		},
		meleeattackpower: function() {
			var totalAp = data.atkPowerBase + data.atkPowerBonus + data.atkPowerLoss;
			return [
				'<h3>' + Core.msg(MsgSummary.stats.meleeAttackPower.title, totalAp) + tooltipBaseStatBonusText(data.atkPowerBase, totalAp) + '</h3>',
				Core.msg(MsgSummary.stats.increases.meleeDps, (totalAp / ATTACK_POWER_MAGIC_NUMBER).toFixed(DPS_DECIMALS))
			];
		},
		meleespeed: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.meleeSpeed.title, (
					data.hasOffhandWeapon ?
					Core.msg(TEMPLATE_MULTIVALUE, data.dmgMainSpeed.toFixed(SPEED_DECIMALS), data.dmgOffSpeed.toFixed(SPEED_DECIMALS)) :
					data.dmgMainSpeed.toFixed(SPEED_DECIMALS)
				)) + '</h3>'
			];
		},
		meleehaste: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.meleeHaste.title, data.haste.toFixed(PERCENT_DECIMALS)) + '</h3>',
				MsgSummary.stats.meleeHaste.description2,
				Core.msg(MsgSummary.stats.meleeHaste.description, data.hasteRating, data.hasteRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		meleehit: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.meleeHit.title, data.hitPercent.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.meleeHit.description, data.hitRating, data.hitRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		meleecrit: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.meleeCrit.title, data.critPercent.toFixed(PERCENT_DECIMALS)) + '</h3>',
				MsgSummary.stats.meleeCrit.description2,
				Core.msg(MsgSummary.stats.meleeCrit.description, data.critRating, data.critRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		expertise: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.expertise.title, (
					data.hasOffhandWeapon ?
					Core.msg(TEMPLATE_MULTIVALUE, data.expertiseMain.toFixed(PERCENT_DECIMALS) + '%', data.expertiseOff.toFixed(PERCENT_DECIMALS) + '%') :
					data.expertiseMain.toFixed(PERCENT_DECIMALS) + '%'
				)) + '</h3>',
				Core.msg(MsgSummary.stats.decreases.dodgeParry, (
					data.hasOffhandWeapon ?
					Core.msg(TEMPLATE_MULTIVALUE, data.expertiseMain.toFixed(PERCENT_DECIMALS) + '%', data.expertiseOff.toFixed(PERCENT_DECIMALS)) :
                    data.expertiseMain.toFixed(PERCENT_DECIMALS)
				)),
				Core.msg(MsgSummary.stats.expertise.description, data.expertiseRating, data.expertiseRatingPercent.toFixed(PERCENT_DECIMALS) + '%')
			];
		},

		// Ranged
		rangeddamage: function() {
			var res = ['<h3>' + MsgSummary.inventory.slots[15] + '</h3>'];
			tooltipDamageDetails(res, data.dmgRangeSpeed, data.dmgRangeMin, data.dmgRangeMax, data.dmgRangeDps);
			return res;
		},
		rangeddps: function() {
			return [
				'<h3>' + MsgSummary.stats.rangedDps.title + '</h3>'
			];
		},
		rangedattackpower: function() {
			var totalRap = data.rangeAtkPowerBase + data.rangeAtkPowerBonus + data.rangeAtkPowerLoss;
			var res = [
				'<h3>' + Core.msg(MsgSummary.stats.rangedAttackPower.title, totalRap) + tooltipBaseStatBonusText(data.rangeAtkPowerBase, totalRap) + '</h3>',
				Core.msg(MsgSummary.stats.increases.rangedDps, (totalRap / ATTACK_POWER_MAGIC_NUMBER).toFixed(DPS_DECIMALS))
			];
			if(data.rap_petAp > 0) {
				res.push(Core.msg(MsgSummary.stats.increases.petAttackPower, data.rap_petAp));
			}
			if(data.rap_petSpellDmg > 0) {
				res.push(Core.msg(MsgSummary.stats.increases.petSpellDamage, data.rap_petSpellDmg));
			}
			return res;
		},
		rangedspeed: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.rangedSpeed.title, data.dmgRangeSpeed.toFixed(SPEED_DECIMALS)) + '</h3>'
			];
		},
		rangedhaste: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.rangedHaste.title, data.rangedHaste.toFixed(PERCENT_DECIMALS)) + '</h3>',
				MsgSummary.stats.rangedHaste.description2,
				Core.msg(MsgSummary.stats.rangedHaste.description, data.rangedHasteRating, data.rangedHasteRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		rangedhit: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.rangedHit.title, data.rangeHitPercent.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.rangedHit.description, data.rangeHitRating, data.rangeHitRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		rangedcrit: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.rangedCrit.title, data.rangeCritPercent.toFixed(PERCENT_DECIMALS)) + '</h3>',
				MsgSummary.stats.rangedCrit.description2,
				Core.msg(MsgSummary.stats.rangedCrit.description, data.rangeCritRating, data.rangeCritRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},

		// Spell
		spellpower: function() {
			var res = [
				'<h3>' + Core.msg(MsgSummary.stats.spellPower.title, data.holyDamage) + '</h3>',
				MsgSummary.stats.spellPower.description
			];
			if(data.spellDmg_petAp > 0 && data.spellDmg_petSpellDmg > 0)
				res.push(Core.msg(MsgSummary.stats.increases.petAttackPowerSpellDamage, data.spellDmg_petAp, data.spellDmg_petSpellDmg));
			return res;
		},
		spellhaste: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.spellHaste.title, data.spellHaste.toFixed(PERCENT_DECIMALS)) + '</h3>',
				MsgSummary.stats.spellHaste.description2,
				Core.msg(MsgSummary.stats.spellHaste.description, data.hasteRating, data.hasteRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		spellhit: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.spellHit.title, data.spellHitPercent.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.spellHit.description, data.spellHitRating, data.spellHitRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		spellcrit: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.spellCrit.title, data.spellCritPercent.toFixed(PERCENT_DECIMALS)) + '</h3>',
				MsgSummary.stats.spellCrit.description2,
				Core.msg(MsgSummary.stats.spellCrit.description, data.spellCritRating, data.spellCritRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		spellpenetration: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.spellPenetration.title, data.spellPenetration) + '</h3>',
				Core.msg(MsgSummary.stats.decreases.enemyRes, 0)
			];
		},
		manaregen: function() {
			return [
				'<h3>' + MsgSummary.stats.manaRegen.title + '</h3>',
				Core.msg(MsgSummary.stats.manaRegen.description , data.manaRegenPerFive)
			];
		},
		combatregen: function() {
			return [
				'<h3>' + MsgSummary.stats.combatRegen.title + '</h3>',
				Core.msg(MsgSummary.stats.combatRegen.description, data.manaRegenCombat)
			];
		},

		// Defense
		armor: function() {
			var res = [
				'<h3>' + Core.msg(MsgSummary.stats.armor.title, data.armorTotal) + '</h3>',
				Core.msg(MsgSummary.stats.decreases.damageTaken, data.armorPercent.toFixed(PERCENT_DECIMALS))
			];
			if(data.armor_petArmor > 0) {
				res.push(Core.msg(MsgSummary.stats.increases.petArmor, data.armor_petArmor));
			}
			return res;
		},
		dodge: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.dodge.title, data.dodge.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.dodge.description, data.dodgeRating, data.dodgeRatingPercent.toFixed(PERCENT_DECIMALS)),
				'<span class="color-q0">' + MsgSummary.stats.beforeReturns + '</span>'
			];
		},
		parry: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.parry.title, data.parry.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.parry.description, data.parryRating, data.parryRatingPercent.toFixed(PERCENT_DECIMALS)),
				'<span class="color-q0">' + MsgSummary.stats.beforeReturns + '</span>'
			];
		},
		block: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.block.title, data.block.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.block.description2, data.block_damage.toFixed(PERCENT_DECIMALS)),
				Core.msg(MsgSummary.stats.block.description, data.blockRating, data.blockRatingPercent.toFixed(PERCENT_DECIMALS))
			];
		},
		resilience: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.resilience.title, data.pvpResilience.toFixed(PERCENT_DECIMALS)) + '</h3>',
				Core.msg(MsgSummary.stats.resilience.description),
                Core.msg(MsgSummary.stats.resilience.description2, data.pvpResilienceRating, data.pvpResilienceBonus.toFixed(PERCENT_DECIMALS))
			];
		},
        pvppower: function() {
            return [
                '<h3>' + Core.msg(MsgSummary.stats.pvppower.title, data.pvpPower.toFixed(PERCENT_DECIMALS)) + '</h3>',
                Core.msg(MsgSummary.stats.pvppower.description),
                Core.msg(MsgSummary.stats.pvppower.description2, data.pvpPowerRating),
                Core.msg(MsgSummary.stats.pvppower.description3, data.pvpPowerHealing.toFixed(PERCENT_DECIMALS)),
                Core.msg(MsgSummary.stats.pvppower.description4, data.pvpPowerDamage.toFixed(PERCENT_DECIMALS))
            ];
        },

		// Resistance
		arcaneres: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.arcaneRes.title, data.arcaneResist) + '</h3>',
				Core.msg(MsgSummary.stats.arcaneRes.description, (0).toFixed(PERCENT_DECIMALS))
			];
		},
		fireres: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.fireRes.title, data.fireResist) + '</h3>',
				Core.msg(MsgSummary.stats.fireRes.description, (0).toFixed(PERCENT_DECIMALS))
			];
		},
		frostres: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.frostRes.title, data.frostResist) + '</h3>',
				Core.msg(MsgSummary.stats.frostRes.description, (0).toFixed(PERCENT_DECIMALS))
			];
		},
		natureres: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.natureRes.title, data.natureResist) + '</h3>',
				Core.msg(MsgSummary.stats.natureRes.description, (0).toFixed(PERCENT_DECIMALS))
			];
		},
		shadowres: function() {
			return [
				'<h3>' + Core.msg(MsgSummary.stats.shadowRes.title, data.shadowResist) + '</h3>',
				Core.msg(MsgSummary.stats.shadowRes.description, (0).toFixed(PERCENT_DECIMALS))
			];
		}
	};

	// Constructor
	init();

	function init() {

		$('#summary-stats').delegate('li', 'mouseover', statMouseOver);
		$('#summary-health, #summary-power, #summary-averageilvl-best').mouseover(statMouseOver);
	}

	function statMouseOver() {

		var $this = $(this);

		var statId = getStatIdFromListItem(this);
		if(!statTooltips[statId] || $this.hasClass('no-tooltip')) {
			return;
		}
		var lines = statTooltips[statId]();
		if(!lines || lines.length <= 0) {
			return;
		}

		var $tooltip = $('<ul/>').addClass('color-tooltip-yellow'); // Yellow overall

		lines[0] = '<div class="color-q1">' + lines[0] + '</div>'; // First line in white
		$tooltip.html('<li>' + lines.join('</li><li>') + '</li>');

		Tooltip.show(this, $tooltip);
	}

	// Tooltip helpers
	function tooltipBaseStatBonusText(base, total) {

		var diff = total - base;
		var diffStr = '';
		if(diff > 0)
			diffStr += '<span class="color-tooltip-green">+' + diff + '</span>';
		else if(diff < 0)
			diffStr += '<span class="color-tooltip-red">+' + diff + '</span>';

		return ' (' + base + diffStr + ')';
	}

    // Tooltip helpers
    function tooltipBaseStatBonusTextPercent(base, total) {

        var diff = total - base;
        var diffStr = '';
        if(diff > 0)
            diffStr += '<span class="color-tooltip-green">+' + diff.toFixed(PERCENT_DECIMALS) + '%' + '</span>';
        else if(diff < 0)
            diffStr += '<span class="color-tooltip-red">+' + diff.toFixed(PERCENT_DECIMALS) + '%' + '</span>';

        return ' (' + base.toFixed(PERCENT_DECIMALS) + '%' + diffStr + ')';
    }

	function tooltipDamageDetails(res, speed, damageMin, damageMax, dps) {
		res.push('<span class="float-right">' + speed.toFixed(SPEED_DECIMALS) + '</span>' + MsgSummary.stats.damage.speed);
		res.push('<span class="float-right">' + Core.msg(TEMPLATE_RANGE, damageMin.toFixed(DAMAGE_DECIMALS), damageMax.toFixed(DAMAGE_DECIMALS)) + '</span>' + MsgSummary.stats.damage.damage);
		res.push('<span class="float-right">' + dps.toFixed(DPS_DECIMALS) + '</span>' + MsgSummary.stats.damage.dps);
	}

	// Utility functions
	function getStatIdFromListItem(li) {

		return $(li).attr('data-id');
	}

};

Summary.RaidProgression = function(options, data) {

	// Constants
	var ICON_WIDTH = 61;
	var SPACER_WIDTH = 26;
	var NUM_RAIDS_AT_A_TIME = 9;
	var SCROLL_ANIM_DURATION = 333;
	var SCROLL_MIN_LEFT = 0;
	var SCROLL_MAX_LEFT;
	var SCROLL_DISTANCE = NUM_RAIDS_AT_A_TIME * (ICON_WIDTH + SPACER_WIDTH);

	// DOM nodes
	var $tableWrapper = $('#summary-raid-wrapper-table');
	var $leftArrow    = $('#summary-raid-arrow-left');
	var $rightArrow   = $('#summary-raid-arrow-right');

	// Variables
	var scrollLeft;

	// Constructor
	init();

	// Public functions
	// ...

	// Private functions
	function init() {
		setScroll();
		setTimeout(initEvents, 1);
	}

	function setScroll() {
		$tableWrapper.scrollLeft(99999); // Far right
		scrollLeft = SCROLL_MAX_LEFT = $tableWrapper.scrollLeft();

		// Left-align the "Trivial" label if the trivial group is initially visible
		if(options.nOptimalRaids + options.nChallengingRaids < NUM_RAIDS_AT_A_TIME) {
			$('#summary-raid-head-trivial').css('left', scrollLeft + 'px');
		}
	}

	function initEvents() {
		$tableWrapper.delegate('tr.normal td, tr.heroic td, tr.lfr td, tr.flex td', 'mouseover', statusMouseOver);
		$leftArrow.click(leftArrowClick);
		$rightArrow.click(rightArrowClick);
	}

	function showRaidDetailedTooltip($node, raid) {

		var heroicMode = $node.parent().hasClass('heroic'),
			flexMode = $node.parent().hasClass('flex'),
			lfrMode = $node.parent().hasClass('lfr'),
			killCountProperty = '';

		var name = raid.name;
		var $tooltip = $('<ul />').addClass('summary-raid-tooltip');
		
		if(heroicMode) {
			name += ' ' + MsgSummary.raid.tooltip.heroic;
			killCountProperty = 'nHeroicKills';
		} else if (lfrMode) {
			name += ' ' + MsgSummary.raid.tooltip.lfr;
			killCountProperty = 'nLfrKills';
		} else if(flexMode){
			name += ' ' + MsgSummary.raid.tooltip.flex;
			killCountProperty = 'nFlexKills';
		} else {
			name += ' ' + MsgSummary.raid.tooltip.normal;
			killCountProperty = 'nKills';
		}
		
		$('<li/>').append($('<h3/>').text(name)).appendTo($tooltip);
		
		var bosses = [];
		var nBossedKilled = 0;

		for(var i = 0; i < raid.bosses.length; ++i) {
			var boss = raid.bosses[i];
			if(boss[killCountProperty] != null) {
				bosses.push(boss);
				if(boss[killCountProperty] != 0) {
				++nBossedKilled;
			}
		}
		}

		var nBosses = bosses.length;
		var percentKilled = Math.round(nBossedKilled / nBosses * 100);

		$tooltip.append($('<li/>').addClass('color-tooltip-yellow').text(Core.msg(MsgSummary.raid.tooltip.complete, percentKilled, nBossedKilled, nBosses)));

		for(var i = 0; i < bosses.length; ++i) {

			var boss = bosses[i];

			var $line = $('<li/>').addClass(boss[killCountProperty] == 0 ? 'incomplete' : 'completed');

			var $count = $('<span/>').addClass('count');
			if(boss[killCountProperty] == -1) {
				$count.text(String.fromCharCode(10004)); // Tick
			} else {
				$count.text(boss[killCountProperty]);
			}
			$count.appendTo($line);

			$('<span/>').addClass('times').text('x').appendTo($line);
			$('<span/>').addClass('name').text(boss.name + (boss.optional ? ' ' + MsgSummary.raid.tooltip.optional : '')).appendTo($line);
			$('<span/>').addClass('clear').appendTo($line);

			$line.appendTo($tooltip);
		}

		Tooltip.show($node, $tooltip);
	}

	function scroll(direction) {

		scrollLeft = Math.min(SCROLL_MAX_LEFT, Math.max(SCROLL_MIN_LEFT, scrollLeft + (SCROLL_DISTANCE * direction)));
		$tableWrapper.stop().animate({scrollLeft: scrollLeft}, SCROLL_ANIM_DURATION);

		showArrow($leftArrow,  scrollLeft > SCROLL_MIN_LEFT);
		showArrow($rightArrow, scrollLeft < SCROLL_MAX_LEFT);
	}

	function showArrow($arrow, visible) {
		if(visible == !$arrow.is(':visible')) {
			setTimeout(function() { $arrow[visible ? 'fadeIn' : 'fadeOut']('fast'); }, 1);
		}
	}

	function hideArrow($arrow) {
		if($arrow.is(':visible')) {
			setTimeout(function() { $arrow.fadeOut(); }, 1);
		}
	}

	// Event handlers
	function statusMouseOver() {
		var $cell = $(this);
		var raid = getRaidFromCell($cell);
		if(!raid) return;

		showRaidDetailedTooltip($cell, raid);
	}

	function timelineMouseOut() {
		var $this = $(this);
		$this.children('div').removeClass('marker-hover');
	}

	function leftArrowClick() {
		scroll(-1);
	}

	function rightArrowClick() {
		scroll(1);
	}

	// Utilities
	function getRaidFromCell($cell) {
		var raidAbbr = $cell.data('raid');
		if(raidAbbr) {
			return data[raidAbbr];
		}
	}
};

Summary.Talents = function(specLinks){
	
	// Show/Hide Talent Builds on spec-button click
	$('#summary-talents').find(".spec-button").each(function(){
		
		var specId = $(this).data("spec-id");

		// Assign click to show build
		$(this).click(function(){
			
			if(!$(this).hasClass("selected")){
				
				// Remove selection, hide build
				$(".spec-button").removeClass("selected");										
				$(".talent-build").hide();

				// Select spec, show build
				$(this).addClass("selected");
				$("#talent-build-" + specId).show();

				// Update export link
				$("#export-build").attr("href", specLinks[specId]);
			}

		});

	});	
}