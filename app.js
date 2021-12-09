const previewElement = document.querySelector("#audioPreview");
const fileAudio = document.querySelector("#fileAudio");

fileAudio.addEventListener("change", function() {
    PreviewAudio(this, previewElement);
});

function PreviewAudio(inputFile, previewElement) {
    const reader = new FileReader();

    reader.readAsDataURL(inputFile.files[0]);

    // previewElement.pause();

    reader.onload = function(e) {
        console.log(e.target.result);
        previewElement.src = e.target.result;
        const audioPreview = previewElement.play();
        if (audioPreview !== undefined) {
            previewElement.style.display = "block";
        }
    };
}