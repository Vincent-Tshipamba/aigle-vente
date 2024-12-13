import jsVectorMap from "jsvectormap";
import "../us-aea-en";
import "../world-merc";

const map01 = async () => {
    const mapSelector = document.querySelectorAll("#mapOne");

    if (mapSelector.length) {
        // Initialiser la carte avec un marqueur par défaut (ex: un marqueur au centre du monde)
        const mapOne = new jsVectorMap({
            selector: "#mapOne",
            map: "world_merc",
            zoomButtons: true,
            
            markerStyle: {
                initial: {
                    fill: "#FF5733", 
                },
            },
        });

        // Récupérer les données des localisations
        const response = await fetch("/api/messages-locations"); // Endpoint API
        const locations = await response.json();

        if (locations.length > 0) {
            // Préparer les données pour jsVectorMap
            const markers = locations.map((location) => ({
                name: `${location.country} (${location.message_count} messages)`,
                coords: [location.latitude, location.longitude],
                style: { fill: "#FF5733" }, 
            }));

            // Mettre à jour la carte avec les vrais marqueurs
            mapOne.addMarkers(markers);
        }
    }
};

export default map01;
