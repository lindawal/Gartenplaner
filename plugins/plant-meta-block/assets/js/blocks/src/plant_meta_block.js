const registerBlockType = wp.blocks.registerBlockType;
const ServerSideRender = wp.serverSideRender;

registerBlockType('plant/meta-data', {
    title: 'Pflanzen-Meta-Daten',
    description: 'Wird angezeigt, wenn Angaben zu Pflanzzeiten und Nährstoffen gemacht wurden.',
    icon: 'carrot',
    category: 'common',

    save: function (props) {       //return null, da bei diesem Block keine Daten im HTML Code gespeichert werden.
        return null;                //Statt desssen werden diese mit Hilfe der Wordpress Komponente ServerSideRender gerendert
    },

    edit: function (props) {
        /*ServerSideRender ist eine Komponente, die für das serverseitige Rendern einer Vorschau dynamischer Blöcke zur Anzeige im Editor verwendet wird*/
        return (
            <div class="components-placeholder">
                        <p>Die Meta-Daten zu dieser Pflanze werden im Frontend angezeigt</p></div>
        // <ServerSideRender block="plant/meta-data"
        //     // attributes={props.attributes}
        //     />
        );
    },
});