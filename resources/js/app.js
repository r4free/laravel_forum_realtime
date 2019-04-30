Vue.component(
    "card-component",
    require("./components/common/CardComponent.vue")
);
Vue.component("replies-component", require("./components/Replies.vue"));
Vue.component("laravel-translate", require("./components/LaravelTranslate.vue"));
Vue.component("threads-component", require("./components/thread/Threads.vue"));
Vue.component("create-thread-component", require("./components/thread/Form.vue"));
Vue.component(
    "preload-component",
    require("./components/common/PreloadComponent.vue")
);
Vue.component(
    "dropdown-locale",
    require("./components/common/navbar/DropdownLocale.vue")
);

Vue.prototype.getUrl = (url = null)=>`http://${window.location.host}/${url}`;

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

const app = new Vue({
    el: "#app",
});
