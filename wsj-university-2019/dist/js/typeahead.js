/* typeahead */
var searchRequest;
$(function($){
  $('.search-autocomplete').autoComplete({
    minChars: 1,
    source: function(term, suggest){
      try { searchRequest.abort(); } catch(e){}

      searchRequest = $.post(global.ajax, { search: term, action: 'search_site' }, function(res) {
        suggest(res.data);
      });
      // searchRequest = $.post(global.ajax, { search: term, action: 'search_site' }, function(res) {
      //   suggest(res.data);
      // });

    }
  });
});

$('.autocomplete-suggestions ').append('<div class="autocomplete-suggestion" data-val="Texas Wesleyan University" onclick="window.location.href=\'http://www.hyperlinkcode.com/button-links.php\'">Testing</div>');