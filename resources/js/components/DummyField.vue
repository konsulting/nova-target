<template></template>

<script>
import {nextTick} from "vue";
import {FormField} from 'laravel-nova'

export default {
    mixins: [FormField],

    props: ['resourceName', 'field'],

    beforeMount() {
        let css = '',
            style = document.createElement('style');

        if (! this.field.hasOwnProperty('hides')) {
            return;
        }

        this.field.hides.forEach((h) => {
            css = css + `${h} { display:none }\n`;
        });

        style.type = 'text/css';
        style.appendChild(document.createTextNode(css));

        document.head.appendChild(style);
    },

    mounted() {
        if (! this.field.hasOwnProperty('adjusts')) {
            return;
        }

        nextTick(() => {
            Object.entries(this.field.adjusts).forEach((adj) => {
                document.querySelectorAll(adj[1].selector).forEach((i) => {
                    if(adj[1].replaceClass.length > 0) {
                        i.className = adj[1].replaceClass;
                    }
                    if(adj[1].removeClass.length > 0) {
                        i.classList.remove(... adj[1].removeClass);
                    }
                    if(adj[1].addClass.length > 0) {
                        i.classList.add(...adj[1].addClass);
                    }
                })
            });
        })
    }
}
</script>
