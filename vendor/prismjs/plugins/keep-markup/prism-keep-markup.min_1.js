!function(e,s){void 0!==e&&e.Prism&&e.document&&s.createRange&&(Prism.plugins.KeepMarkup=!0,Prism.hooks.add("before-highlight",function(e){if(e.element.children.length){var a=0,s=[],p=function(e,n){var o={};n||(o.clone=e.cloneNode(!1),o.posOpen=a,s.push(o));for(var t=0,d=e.childNodes.length;t<d;t++){var r=e.childNodes[t];1===r.nodeType?p(r):3===r.nodeType&&(a+=r.data.length)}n||(o.posClose=a)};p(e.element,!0),s&&s.length&&(e.keepMarkup=s)}}),Prism.hooks.add("after-highlight",function(n){if(n.keepMarkup&&n.keepMarkup.length){var a=function(e,n){for(var o=0,t=e.childNodes.length;o<t;o++){var d=e.childNodes[o];if(1===d.nodeType){if(!a(d,n))return!1}else 3===d.nodeType&&(!n.nodeStart&&n.pos+d.data.length>n.node.posOpen&&(n.nodeStart=d,n.nodeStartPos=n.node.posOpen-n.pos),n.nodeStart&&n.pos+d.data.length>=n.node.posClose&&(n.nodeEnd=d,n.nodeEndPos=n.node.posClose-n.pos),n.pos+=d.data.length);if(n.nodeStart&&n.nodeEnd){var r=s.createRange();return r.setStart(n.nodeStart,n.nodeStartPos),r.setEnd(n.nodeEnd,n.nodeEndPos),n.node.clone.appendChild(r.extractContents()),r.insertNode(n.node.clone),r.detach(),!1}}return!0};n.keepMarkup.forEach(function(e){a(n.element,{node:e,pos:0})}),n.highlightedCode=n.element.innerHTML}}))}(self,document);