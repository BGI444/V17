

document.addEventListener('DOMContentLoaded', function(){
  //EventListener: Wartet bis das html komplett geladen wurde, bevor die Ausführungen starten.
  //Sonst kann es passieren, dass das Script läuft, bevor das html geladen wurde, wodurch "undefined variablen"
  //ausgespielt werden (weil es noch nichts zum Deklarieren gegeben hat)

/* Start Saison Specials */

// ALLE SAISON-SPECIALS EINTRÄGE
//Alle Specials-Einträge als Array anlegen (so funktioniert die for-Schleife nachher gut)

  var specialsData = [
    [ //frühlingsspecials
      {
        gerichtname: 'Spargel mit Sauce Hollandaise',
        p: 'Frischer Spargel mit Sauce Hollandaise und neuen Kartoffeln',
        preis: '€ 14,50',
        specialsfoto: 'spargel'
      },

      {
        specialsfoto: 'topfenknoedel',
        gerichtname: 'Topfenknödel mit Erdbeersauce',
        p: 'Luftige Topfenknödel serviert mit einer köstlichen Erdbeersauce',
        preis: '€ 9,80'
      },

      {
        gerichtname: 'Rhabarber-Streuselkuchen mit Vanillesauce',
        p: 'Saftiger Rhabarber mit einer warmen Vanillesauce',
        preis: '€ 5,90',
        specialsfoto: 'rhabarber'
      },
    ],

    [ //sommerspecials
      {
        gerichtname: 'Forellenfilet mit Petersilienkartoffeln und Gurkensalat',
        p: 'Frisches Forellenfilet serviert mit Petersilienkartoffeln',
        preis: '€ 17,50',
        specialsfoto: 'forellenfilet'
      },

      {
        specialsfoto: 'gemuesestrudel',
        gerichtname: 'Gemüsestrudel mit frischen Kräutern und Salatbouquet',
        p: 'Strudel gefüllt mit einer Vielzahl von Sommergemüse ',
        preis: '€ 12,90'
      },

      {
        gerichtname: 'Erdbeer-Joghurt-Torte mit frischen Früchten',
        p: 'Torte mit einem cremigen Joghurtfüllung',
        preis: '€ 6,50',
        specialsfoto: 'erdbeertorte'
      },
    ],

    [ //herbstspecials
      {
        gerichtname: 'Wildgulasch mit Semmelknödeln und Preiselbeeren',
        p: 'Zartes Wildfleisch in Rotweinsauce mit Semmelknödel',
        preis: '€ 19,90',
        specialsfoto: 'wildgulasch'
      },

      {
        specialsfoto: 'risotto',
        gerichtname: 'Kürbisrisotto mit Kürbiskernen und Parmesan',
        p: 'Cremiges Risotto, verfeinert mit köstlichem Kürbispüree',
        preis: '€ 14,50'
      },

      {
        gerichtname: 'Apfelstrudel mit Vanillesauce',
        p: 'klassischer österreichischer Apfelstrudel',
        preis: '€ 7,50',
        specialsfoto: 'apfelstrudel'
      },
    ],

   [ //winterspecials
      {
        gerichtname: 'Rinderbraten mit Rotkraut und Semmelknödeln',
        p: 'Rindfleisch mit Rotweinsauce und Semmelknödel',
        preis: '€ 18,90',
        specialsfoto: 'rinderbraten'
      },

      {
        specialsfoto: 'spaetzle',
        gerichtname: 'Käsespätzle mit karamellisierten Zwiebeln und Röstzwiebeln',
        p: 'Hausgemachte Spätzle, mit einer reichhaltigen Käsesauce überzogen',
        preis: '€ 12,50'
      },

      {
        gerichtname: 'Heiße Schokolade Soufflé mit Vanilleeis und Himbeersauce',
        p: 'Schokoladensoufflé gefüllt mit flüssiger Schokolade',
        preis: '€ 8,50',
        specialsfoto: 'schoki'
      }
    ]
  ];



  // Dort sollen Specials angehängt werden
  var specialsDiv = document.querySelector('#changingSpecials');

  // Überprüfen, ob die richtige Divs getargeted wurden
  console.log(specialsDiv);

  // ZEICHNE SPECIALS - EINTRÄGE LAUT JSON
  function zeichneSpecials() {

      // ZUFALLSZAHL/RANDOM SPECIALS-ANZEIGE

      // beispiel zufallszahl erzeugen
      var current_season = Math.floor((Math.random()*4));
      // console.log Funktion, zur Überprüfung
      console.log(current_season);
      let posCounter = 0;
      let pos1;
      let pos2;

      // array durchgehen mit for-Schleife und in current_season einsteigen
      for (i of specialsData[current_season]){
        posCounter++;
        if (posCounter == 1 || posCounter == 3){
          pos1 = 'oben';
          pos2 = 'unten';
        } else {
          pos2 = 'oben';
          pos1 = 'unten';

        }
        console.log(i);

        /* SpecialsDiv wird mit dem dynamischen Content aus der For-Schleife geschrieben
        Auf diese Art kann man mehrere String-Linien schreiben.
        Mit ${} kann man die variable hineinkopieren.
        Das Objekt ist immer "i".
        Funktion "+=" um das Gericht hinzuzufügen (anstatt es zu ersetzen, denn dann hätten wir bei jeder Schleife
        am Ende nur ein Gericht) */

        if (posCounter == 1 || posCounter == 3){
          specialsDiv.innerHTML +=
              `<div class="specials-eintrag">
                <div class="specialsbeschreibung ${pos1} text-mobile-pos"><br>
                  <h2 class="gerichtname">${i.gerichtname}</h2>
                  <p>${i.p}</p>
                  <span class="item preis">${i.preis}</span></div>
                <div class="specialsfoto ${pos2} ${i.specialsfoto} img-mobile-pos" role="img" title="${i.gerichtname}"></div>
              </div>`;
        } else {
          specialsDiv.innerHTML +=
              `<div class="specials-eintrag">
                <div class="specialsbeschreibung ${pos1} text-mobile-pos"><br>
                  <h2 class="gerichtname vegan">${i.gerichtname}</h2>
                  <p>${i.p}</p>
                  <span class="item preis">${i.preis}</span></div>
                <div class="specialsfoto ${pos2} ${i.specialsfoto} img-mobile-pos" role="img" title="${i.gerichtname}"></div>
              </div>`;
        }
      }

  };
  // Funktion die wir oben geschrieben haben, wird aufgerufen
  zeichneSpecials();
});