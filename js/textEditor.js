var EmbedYoutube = Quill.import('blots/embed');

class YoutubeVideo extends EmbedYoutube {
    static create(url) {
        const node = super.create();
        node.setAttribute('src', url);
        node.setAttribute('frameborder', '0');
        node.setAttribute('allowfullscreen', true);
        return node;
    }

    static formats(node) {
        return node.getAttribute('src');
    }

    static value(node) {
        return node.getAttribute('src');
    }

    format(name, value) {
        super.format(name, value);
    }
}

YoutubeVideo.blotName = 'youtube-video';
YoutubeVideo.tagName = 'iframe';
Quill.register(YoutubeVideo);

var toolbarOptions = {
    container: [
      [{ 'header': [1, 2, 3, 4, false] }],
      ['bold', 'italic', 'underline', 'strike'],
      [{ 'color': [] }, { 'background': [] }],
      [{ 'align': [] }],
      ['image', { 'youtube-video': { icon: '<i class="bi bi-youtube"></i>' } }],
      ['clean']
    ],
    handlers: {
      'youtube-video': function () {
        var url = prompt('Enter YouTube video URL');
        if (url) {
          var range = this.quill.getSelection();
          newUrl = url.replace('watch?v=', 'embed/')
          this.quill.insertEmbed(range.index, 'youtube-video', newUrl, Quill.sources.USER);
        }
      }
    }
  };
  
  var quill = new Quill('#editor', {
    modules: {
      toolbar: toolbarOptions
    },
    theme: 'snow'
  });

  document.querySelector('.ql-youtube-video').innerHTML = '<i class="bi bi-youtube"></i>';

  var content = document.querySelector(".ql-editor")

  content.addEventListener('DOMSubtreeModified', function() {
    document.getElementById('textEditorValue').value = content.innerHTML
    if (content.innerHTML === "") {
        document.getElementById('submitBtn').type = 'button'
    } else {
        document.getElementById('submitBtn').type = 'submit'
    }
  })

  function displayImage() {

    var file = document.getElementById('image').files[0];
    var reader  = new FileReader();
    // it's onload event and you forgot (parameters)
    reader.onload = function(e)  {
        var image = document.createElement("img");
        image.src = e.target.result;
        document.getElementById('imgWrapper').innerHTML = '<img src="'+image.src+'"/>';
     }
     reader.readAsDataURL(file);
 }