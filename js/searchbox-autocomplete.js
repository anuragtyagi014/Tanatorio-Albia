// init Bloodhound
var lsl_cities = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    wildcard: '%QUERY',
    url: `${site_url}/wp-json/lyra-store-locator/v1/centre_cities?name=%QUERY`,
  }
});

// init Typeahead
$('.searchBox, .searchBoxHome').typeahead(
  {
    hint: true,
    minLength: 2,
    highlight: true
  },
  {
    source: lsl_cities,   // suggestion engine is passed as the source
  });
