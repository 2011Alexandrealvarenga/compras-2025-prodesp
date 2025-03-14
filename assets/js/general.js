// inicio - tag a insira alt e title se nao tiver 
document.querySelectorAll('a').forEach(link => {
  const linkText = link.textContent.trim();

    if (!link.hasAttribute('alt')) {
        link.setAttribute('alt', linkText);
    }

    if (!link.hasAttribute('title')) {
        link.setAttribute('title', linkText);
    }
  });
// fim - tag a insira alt e title se nao tiver
  // inicio - tag img inserir alt e title se nao tiver
    document.addEventListener("DOMContentLoaded", function() {
      const images = document.querySelectorAll("img");
  
      images.forEach(img => {
          if (img.src) {
              const fileName = img.src.split('/').pop().split('.').shift();
  
              if (!img.alt && !img.title) {
                  img.alt = fileName;
                  img.title = fileName;
              }
              else if (!img.alt) {
                  img.alt = fileName;
              }
              else if (!img.title) {
                  img.title = fileName;
              }
          } else {
              console.warn("Imagem sem atributo src:", img);
          }
      });
  });
  // fim - tag img inserir alt e title se nao tiver