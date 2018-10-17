require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


$('form').on('submit', function(){
    $(this).find('input[type=submit]').attr('disabled', true);
});

// window.Echo.channel('messages-channel')
//     .listen('MessageWasReceived', (data) => {
//         console.log(data);
//     })

window.Echo.channel('messages-channel')
    .listen('MessageWasReceived', (data) => {
        let message = data.message;
        let html = `
        <tr>
            <td>${message.id }</td>
            <td>${message.nombre}</td>
            <td>${message.email}</td>
            <td>${message.mensaje}</td>
            <td></td>
            <td></td>
            <td>
                <a class="btn btn-info btn-group-xs" href="/mensajes/${message.id}/edit">Editar</a>
                <form style="display:inline" method="POST" action="/mensajes/${message.id}">
                    <input type="hidden" name="_token" value="${Laravel.csrfToken}"/>
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        `;

        $(html).prependTo('tbody');
    });
