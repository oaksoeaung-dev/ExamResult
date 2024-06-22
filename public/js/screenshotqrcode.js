document.getElementById('capture-btn').addEventListener('click', function () {
    html2canvas(document.querySelector("#capture-area")).then(canvas => {
        let link = document.createElement('a');
        link.download = 'capture.png';
        link.href = canvas.toDataURL();
        link.click();
    });
});