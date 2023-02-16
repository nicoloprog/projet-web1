
function genererEtoile(nombre) {  
  let stringEtoiles = '';
  for (let i = 0; i < nombre; i++) {
    stringEtoiles = stringEtoiles 
  }
  return stringEtoiles
}

function genererChiffreAleatoire(max) {
  const chiffresAleatoires = []
  while (chiffresAleatoires.length < 4) {
    const chiffreAleatoire = Math.floor(Math.random() * max);
    if (!chiffresAleatoires.includes(chiffreAleatoire)) {
      chiffresAleatoires.push(chiffreAleatoire)
    }
  }
  return chiffresAleatoires
}

fetch("public/data/commentaires.json")
  .then(reponse => reponse.json())
  .then(json => {
    const chiffresAleatoires = genererChiffreAleatoire(json.length)
    for (let i = 0; i < 4; i++) {
      const bulle = document.getElementsByClassName(`bulle${i + 1}`)[0]
      bulle.innerHTML = `\
      <p class='paragraphe-bulle'>\
        ${json[chiffresAleatoires[i]].description}
      </p>\
      <div class='satisfaction-profile'>\
        <img src='${json[chiffresAleatoires[i]].image}' width='69px height='69px' alt='profile-image'>\
        <div>\
          <h6>${json[chiffresAleatoires[i]].nom}</h6>\
          <span><strong>${json[chiffresAleatoires[i]].evaluation}/5⭐</strong></span>\
        </div>\
      </div>`
    }
  });


  


