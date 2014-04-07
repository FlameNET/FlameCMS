/**
 * Helper object for loading JSON(P) search results for a given query into a given target search pane element.
 */
var SearchPane = {
	
	/**
	 * Path to search request handler that provides results in JSON(P) format.
	 */
	searchUrl: '/search/json',
	
	/**
	 * Default type to use when displaying search results.
	 */
	defaultDisplayType: 'article',
	
	/**
	 * Search results format. Default type is JSONP.
	 */
	dataType: 'jsonp',
	
	/**
	 * Class of the search result list element in SearchPane.defaultRenderFunction.
	 */
	defaultResultListElementClass: 'search-pane-result-list',
	
	/**
	 * Loads search results for a given query into target element, optionally using customRenderFunction.
	 *
	 * @param target				Selector for a search pane element to load results into.
	 * @param query					Search query, example: {query: 'patch 5.2', type: 'article'}.
	 * @param customRenderFunction	(optional) Custom rendering function to use for search results.
	 */
	load: function(target, query, customRenderFunction) {
		var displayType = SearchPane.defaultDisplayType,
			targetElement = $(target),
			renderFunction = customRenderFunction;
		
		if (!renderFunction) {
			renderFunction = SearchPane.defaultRenderFunction;
		}
		if (query.type) {
			displayType = query.type;
		}
		$.ajax({
			type: 'GET',
			url: jsonSearchHandlerUrl + '/' + Core.language + SearchPane.searchUrl,
			dataType: SearchPane.dataType,
			async: true,
			cache: true,
			data: {
				q: query.query,
				f: query.type,
				a: query.author,
				r: query.results,
				k: query.keyword,
				community: query.community,
				sort: query.sortBy,
				dir: query.sortOrder
			},
			success: function(data) {
				targetElement.html(renderFunction(data, displayType));
			},
			error: function(xhr) {
				targetElement.text(Msg.ui.unexpectedError);
			}
		});
	},
	
	/**
	 * Default search results rendering function for the search pane element.
	 * 
	 * @param response		Search response object containing a map of results and counts by result type.
	 * @param displayType	Type of results to display.
	 */
	defaultRenderFunction: function(response, displayType) {
		var typeResults = response.results[displayType],
			container = $('<ul/>');
		
		container.attr('class', SearchPane.defaultResultListElementClass);
		if (!typeResults) {
			container = $('<div/>');
			container.text(Msg.search.noResults);
		} else {
			for (var i = 0; i < typeResults.length; i++) {
				var result = $('<li/>');
				var link = $('<a/>');
				link.attr('href', typeResults[i].url);
				link.text(typeResults[i].title);
				result.append(link);
				container.append(result);
			}			
		}
		return container;
	}
}