const editor = document.querySelector(".content");
const buttons = document.querySelectorAll(".btn");
const simpleButtons = document.querySelectorAll(".btn1")

buttons.forEach((button) => {
    button.addEventListener("click", () => {
        const command = button.getAttribute("data-command");

        if (command === "formatBlock") {
            const value = button.value;
            document.execCommand(command, false, value);
        } else if (command === "createLink") {
            const url = prompt("Enter the URL:");
            document.execCommand(command, false, url);
        } else {
            document.execCommand(command, false, null);
        }
    });
});

simpleButtons.forEach((button) => {
    button.addEventListener('click', () => {
        let value = button.value
        console.log('clicked')
        if (value == 'inactive') {
            button.value = 'active';
            button.classList.add('activeBtn')
        } else {
            button.value = 'inactive';
            button.classList.remove('activeBtn')
        }
    })

})

document.addEventListener("click", (e) => {
    if (!e.composedPath().includes(document.querySelector(".editor"))) {
        simpleButtons.forEach((button) => {
            button.classList.remove('activeBtn')
        })
    }
    
});

function saveContent() {
    const content = editor.innerHTML;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`content=${encodeURIComponent(content)}`);
}

textEditor = document.getElementById('textEditor')

textEditor.addEventListener('DOMSubtreeModified', function() {
    document.getElementById('textEditorValue').value = textEditor.innerHTML   
    if (textEditor.innerHTML === "") {
        document.getElementById('submitBtn').type = 'button'
    } else {
        document.getElementById('submitBtn').type = 'submit'
    }
  });