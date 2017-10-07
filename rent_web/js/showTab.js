window.onload=function () {
    var tab_bar = document.getElementById("tab-bar");
    var tab_btns = tab_bar.children;
    for (var i = 0; i < tab_btns.length; i++) {
        tab_btns[i].onclick = tabClick;

    }
    function tabClick() {
        var this_class = this.className;
        if (this_class !== "tab-btn active") {
            var nowActive = document.getElementsByClassName("active")[0];
            nowActive.className = "tab-btn";//  取消激活状态
            var nowActiveContentId=nowActive.getAttribute("data-content");//隐藏当前内容
            var nowActiveContent=document.getElementById(nowActiveContentId);
            nowActiveContent.style.display="none";

            this.className = "tab-btn active";//设置当前选项为激活状态
            var showId = this.getAttribute("data-content"); //显示当前内容
            var showContent = document.getElementById(showId);
            showContent.style.display="inline-block";



        }
        return false;
    }
};