!function(d){d.languages.diff={coord:[/^(?:\*{3}|-{3}|\+{3}).*$/m,/^@@.*@@$/m,/^\d+.*$/m]};var r={"deleted-sign":"-","deleted-arrow":"<","inserted-sign":"+","inserted-arrow":">",unchanged:" ",diff:"!"};Object.keys(r).forEach(function(e){var n=r[e],a=[];/^\w+$/.test(e)||a.push(/\w+/.exec(e)[0]),"diff"===e&&a.push("bold"),d.languages.diff[e]={pattern:RegExp("^(?:["+n+"].*(?:\r\n?|\n|(?![\\s\\S])))+","m"),alias:a}}),Object.defineProperty(d.languages.diff,"PREFIXES",{value:r})}(Prism);