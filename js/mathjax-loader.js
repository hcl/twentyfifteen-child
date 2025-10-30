document.addEventListener('DOMContentLoaded', () => {
    const mathBlocks = document.querySelectorAll('span.mathjax, div.mathjax');
    if (mathBlocks.length === 0) return;

    // Configure MathJax before loading
    window.MathJax = {
        tex: {
            processEscapes: true,
            packages: { '[+]': ['noerrors'] },
        },
        options: {
            renderActions: {
                find: [
                    10,
                    (doc) => {
                        mathBlocks.forEach((node) => {
                            const isTextNode = node.childNodes.length === 1 && node.firstChild.nodeType === Node.TEXT_NODE;
                            if (!isTextNode) return;

                            const display = node.nodeName.toLowerCase() === 'div';
                            const math = new doc.options.MathItem(node.textContent, doc.inputJax.tex, display);

                            const text = document.createTextNode('');
                            node.replaceChild(text, node.firstChild);

                            math.start = math.end = { node: text, delim: '', n: 0 };
                            doc.math.push(math);
                        });
                    },
                    '',
                    false,
                ],
            },
        },
        loader: {
            load: [
                'input/tex',
                'output/chtml',
                '[tex]/noerrors',
            ],
        },
    };

    // Dynamically load MathJax with native fetch instead of jQuery
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/mathjax@4/startup.js';
    script.async = true;
    script.onload = () => console.log('✅ MathJax loaded successfully.');
    script.onerror = () => console.error('❌ Failed to load MathJax.');
    document.head.appendChild(script);
});
