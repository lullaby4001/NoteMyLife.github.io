updateCalendar();
//current 目前點擊的日期
var currentPostItID = 0; //目前的記事ID
var newCurrentPostIt = false; //目前的記事是否為新？也就是：目前點選的日期尚未有任何的記事資料
var currentPostItIndex = 0; //目前的記事在postIts陣列中的位置索引

function openMakeNote() {
    var modal = document.getElementById("modal");
    modal.open = true;
    var template = document.getElementById("make-note");
    template.removeAttribute("hidden");
    document.getElementById("edit-post-it").focus(); //游標跳至文字輸入方塊中, 解決autofocus無作用的問題

    if (!newCurrentPostIt) {
        document.getElementById("edit-post-it").value = postIts[currentPostItIndex].note;
    }
}

function closeMakeNote() {
    //關閉對話方塊
    var modal = document.getElementById("modal");
    modal.open = false;
    var template = document.getElementById("make-note");
    template.setAttribute("hidden", "hidden");
}

function dayClicked(elm) {
    console.log(elm.dataset.uid)
    currentPostItID = elm.dataset.uid; //目前的記事ID為所點擊的日期表格上的uid
    currentDayHasNote(currentPostItID); //判斷目前點蠕擊的日期是否有記事資料
    if (newCurrentPostIt == false) document.getElementById("edit-post-it").value = postIts[currentPostItIndex].note;
    openMakeNote();
}


function currentDayHasNote(uid) { //測試特定UID是否已經有記事
    for (var i = 0; i < postIts.length; i++) {
        if (postIts[i].id == uid) {
            newCurrentPostIt = false;
            currentPostItIndex = i;
            return;
        }
    }
    newCurrentPostIt = true;
}

function getRandom(min, max) { //傳回介於min與max間的亂數值
    return Math.floor(Math.random() * (max - min)) + min;
}

function submitPostIt() { //按了PostIt按鍵後，所要執行的方法
    const value = document.getElementById("edit-post-it").value;
    if (value == "") { //如果輸入是空白的話…
        closeMakeNote();
        return;
    }
    document.getElementById("edit-post-it").value = "";
    let num = getRandom(1, 6); //取得1~5的亂數，用來標示便利貼顏色的檔案代號,   min <= num < max
    let postIt = {
        id: currentPostItID,
        note_num: num,
        note: value
    }
    if (newCurrentPostIt) { //如果是新記事的話
        postIts.push(postIt); //將新記事postIT物件推入postIts陣列
    } else {
        postIts[currentPostItIndex].note = postIt.note; //更新現有記事物件的記事資料
    }
    console.log(postIts)
        // console.log(document.getElementsByTagName('tbody')[0].innerHTML);
    fillInMonth(thisYear, thisMonth);
    closeMakeNote();
}

function deleteNote() {
    document.getElementById("edit-post-it").value = "";
    let indexToDel;
    if (!newCurrentPostIt) { //不是新記事資料的話, currentPostItIndex指向目前td的記事資料(postIts記事物件陣列中)，也就是目前要刪除的記事資料
        indexToDel = currentPostItIndex; //indexToDel指向將要刪除的資料
    }
    if (indexToDel != undefined) { //indexToDel有值的話…
        postIts.splice(indexToDel, 1); //從indexToDel開始，數量1，刪除postIts中的元素
        console.log(postIts)
    }
    fillInMonth(thisYear, thisMonth);
    closeMakeNote();
}