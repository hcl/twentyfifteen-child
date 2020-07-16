const math_pattern = /\\\((.*)\\\)|\\\[(.*)\\\]/gm;
if (math_pattern.test(document.body.innerHTML)){
    jQuery.ajax({
        url: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS_CHTML,Safe',
        dataType: 'script',
        cache: true, 
        success: function() {
            console.log('Load MathJax.');
        }
    });
    window.MathJax = {
		extensions: ["tex2jax.js"],
		jax: ["input/TeX", "output/HTML-CSS"],
		tex2jax: {
			inlineMath: [ ["\\(","\\)"] ],
			displayMath: [ ["\\[","\\]"] ],
			processEscapes: true
		},
		"HTML-CSS": { availableFonts: ["TeX"] }
	};
}
