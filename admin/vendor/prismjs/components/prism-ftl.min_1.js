!function(n){for(var a="(?!<#--)[^()\"']|\\((?:<expr>)*\\)|<#--[\\s\\S]*?--\x3e|\"(?:[^\\\\\"]|\\\\.)*\"|'(?:[^\\\\']|\\\\.)*'",e=0;e<2;e++)a=a.replace(/<expr>/g,a);a=a.replace(/<expr>/g,"[^sS]");var t={comment:/<#--[\s\S]*?-->/,string:[{pattern:/\br("|')(?:(?!\1)[^\\]|\\.)*\1/,greedy:!0},{pattern:RegExp("(\"|')(?:(?!\\1|\\$\\{)[^\\\\]|\\\\.|\\$\\{(?:<expr>)*?\\})*\\1".replace(/<expr>/g,a)),greedy:!0,inside:{interpolation:{pattern:RegExp("((?:^|[^\\\\])(?:\\\\\\\\)*)\\$\\{(?:<expr>)*?\\}".replace(/<expr>/g,a)),lookbehind:!0,inside:{"interpolation-punctuation":{pattern:/^\$\{|\}$/,alias:"punctuation"},rest:null}}}}],keyword:/\b(?:as)\b/,boolean:/\b(?:true|false)\b/,"builtin-function":{pattern:/((?:^|[^?])\?\s*)\w+/,lookbehind:!0,alias:"function"},function:/\w+(?=\s*\()/,number:/\d+(?:\.\d+)?/,operator:/\.\.[<*!]?|->|--|\+\+|&&|\|\||\?{1,2}|[-+*/%!=<>]=?|\b(?:gt|gte|lt|lte)\b/,punctuation:/[,;.:()[\]{}]/};t.string[1].inside.interpolation.inside.rest=t,n.languages.ftl={"ftl-comment":{pattern:/^<#--[\s\S]*/,alias:"comment"},"ftl-directive":{pattern:/^<[\s\S]+>$/,inside:{directive:{pattern:/(^<\/?)[#@][a-z]\w*/i,lookbehind:!0,alias:"keyword"},punctuation:/^<\/?|\/?>$/,content:{pattern:/[\s\S]*\S[\s\S]*/,alias:"ftl",inside:t}}},"ftl-interpolation":{pattern:/^\$\{[\s\S]*\}$/,inside:{punctuation:/^\$\{|\}$/,content:{pattern:/[\s\S]*\S[\s\S]*/,alias:"ftl",inside:t}}}},n.hooks.add("before-tokenize",function(e){var t=RegExp("<#--[\\s\\S]*?--\x3e|<\\/?[#@][a-zA-Z](?:<expr>)*?>|\\$\\{(?:<expr>)*?\\}".replace(/<expr>/g,a),"gi");n.languages["markup-templating"].buildPlaceholders(e,"ftl",t)}),n.hooks.add("after-tokenize",function(e){n.languages["markup-templating"].tokenizePlaceholders(e,"ftl")})}(Prism);