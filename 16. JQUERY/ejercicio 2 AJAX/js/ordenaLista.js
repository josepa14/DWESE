function ordenaPaises(){
    $("li").sort(function(a,b){return a.innerHTML.localeCompare(b.innerHTML)})
    .text(function(i,v){return (i+1)+". "+v})
    .appendTo("ul")
}