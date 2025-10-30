if (!('CSS' in window && CSS.supports('(text-autospace: normal)'))) {
  jQuery.ajax({
      url: TwentyFifteenChildData.stylesheet_directory_uri + '/js/text-autospace.min.js',
      dataType: 'script',
      cache: true, 
  });
}
