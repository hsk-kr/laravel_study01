const classes = [];

function createClass(num) {
    const rowDiv = document.createElement("div");
    rowDiv.className = "form-group row lecture-class";

    const label = document.createElement("label");
    label.className = "col-md-4 col-form-label text-md-right";
    label.innerText = `${num} week`;

    const inputCoverDiv = document.createElement("div");
    inputCoverDiv.className = "col-md-6";

    const inputText = document.createElement("input");
    inputText.type = "text";
    inputText.className = "form-control";
    inputText.name = "classes[]";

    inputCoverDiv.appendChild(inputText);

    rowDiv.appendChild(label);
    rowDiv.appendChild(inputCoverDiv);

    return rowDiv;
}

function removeButtonGroupInClass() {
    const btnGroup = document.querySelector(".lecture-class .btn-group");
    if (btnGroup) btnGroup.remove();
}

function createButtonGroupInLastClass() {
    const btnGroup = document.createElement("div");
    btnGroup.className = "btn-group";

    if (classes.length > 1) {
        const removeClassBtn = document.createElement("button");
        removeClassBtn.className = "btn btn-danger delete-class-btn";
        removeClassBtn.type = "button";
        removeClassBtn.innerText = "-";
        removeClassBtn.addEventListener("click", deleteLastClass);
        btnGroup.appendChild(removeClassBtn);
    }

    const appendClassBtn = document.createElement("button");
    appendClassBtn.className = "btn btn-primary append-class-btn";
    appendClassBtn.type = "button";
    appendClassBtn.innerText = "+";
    appendClassBtn.addEventListener("click", appendClassToClassList);

    btnGroup.appendChild(appendClassBtn);

    classes[classes.length - 1].appendChild(btnGroup);
}

function appendClassToClassList() {
    const newClass = createClass(classes.length + 1);
    const lectureClassElmts = document.getElementsByClassName("lecture-class");
    const lastClass = lectureClassElmts[lectureClassElmts.length - 1];
    if (!lastClass) return;
    lastClass.after(newClass);
    classes.push(newClass);

    removeButtonGroupInClass();
    createButtonGroupInLastClass();
}

function deleteLastClass() {
    if (classes.length < 1) {
        return;
    }

    const lastClass = classes.pop();
    lastClass.remove();
    createButtonGroupInLastClass();
}

//! 다른 페이지에서도 사용될 수 있음. import 정해진 위치에서 하거나 추가 로직 필요.
window.addEventListener("load", () => {
    appendClassToClassList();
});
