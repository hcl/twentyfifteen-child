# Twenty Fifteen Child

A self-using WordPress theme based on official [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen/) theme.

## Usage
1. This is a child theme which requires original theme to work. MAKE SURE you have Twenty Fifteen theme installed!
2. Install it with following command:
```
wget https://github.com/hcl/twentyfifteen-child/archive/master.zip
unzip master.zip
cp -R twentyfifteen-child-master /path/to/your/wordpress/wp-content/themes/twentyfifteen-child
```
3. Enable it in the WordPress Dashboard.
4. ~~Enjoy!~~

## Features
1. Keep the original style as much as possible.
2. ~~Fixed several uncomfortable CSS.~~
3. Add MathJax for LaTeX flavor equation display. 
   The MathJax library is loaded on demand. [Shortcode](https://codex.wordpress.org/Shortcode) `[latex]` is added for consistency. 
   For inline equation, use `[latex][/latex]`. For display equation, use `[latex display=true][/latex]`. 
4. Add text-autospace bwtween ideographic and non-ideographic text. 
   For newer browser, CSS property `text-autospace` is set. Old `text-autospace.js` is keeped for old browser and only loaded when required.
   The compatible of `text-autospace` property can be checked [here](https://developer.mozilla.org/en-US/docs/Web/CSS/text-autospace#browser_compatibility)).
5. ~~Replace original Google Fonts API with self-hosted fonts.~~
   The original Twenty Fifteen theme now have localized font.
6. Add dark mode using `dark` color scheme from original theme.

## License
Original theme and this child theme are licensed under GNU General Public License v2 or later.
```
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
```

