import jsVectorMap from "jsvectormap";
import "../us-aea-en";
import "../world-merc";

const map01 = () => {
  const mapSelector = document.querySelectorAll("#mapOne");

  if (mapSelector.length) {
    const mapOne = new jsVectorMap({
      selector: "#mapOne",
      map: "world_merc", // Utilisez la carte mondiale
      zoomButtons: true,

      regionStyle: {
        initial: {
          fill: "#C8D0D8", // Couleur initiale
        },
        hover: {
          fillOpacity: 1,
          fill: "#3056D3", // Couleur au survol
        },
      },
      regionLabelStyle: {
        initial: {
          fontFamily: "Satoshi",
          fontWeight: "semibold",
          fill: "#fff",
        },
        hover: {
          cursor: "pointer",
        },
      },

      labels: {
        regions: {
          render(code) {
            return code; // Affiche le code du pays
          },
        },
      },
    });
  }
};

export default map01;
