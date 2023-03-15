export const tagbuttons = () => {
    const textarea = document.getElementById("createTextarea");
    const btnH1 = document.getElementById("btn-h1");
    const btnP = document.getElementById("btn-p");
    const btnCode = document.getElementById("btn-code");

    if (btnH1 !== null && btnP !== null) {
        btnH1.addEventListener("click", function (e) {
            e.preventDefault()
            insertTag("h1", textarea);
        });
        btnP.addEventListener("click", function (e) {
            e.preventDefault()
            insertTag("p", textarea);
        });
        btnCode.addEventListener("click", function (e) {
            e.preventDefault()
            insertTag("code", textarea);
        });

        function insertTag(tag, whereInsert) {
            startTag = "<" + tag + ">";
            endTag = "</" + tag + ">";
            if (tag === "code") {
                var startTag = "<pre>\n<code class='language-js'>\n\n";
                var endTag = "</code>\n</pre>";
            }
            var selectedText = whereInsert.value.substring(whereInsert.selectionStart, whereInsert.selectionEnd);
            var replacement = startTag + selectedText + endTag;
            whereInsert.setRangeText(replacement, whereInsert.selectionStart, whereInsert.selectionEnd, "end");
        }
    };

}