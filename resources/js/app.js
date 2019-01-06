Vue.component(
    "card-component",
    require("./components/common/CardComponent.vue")
);
Vue.component("replies-component", require("./components/Replies.vue"));
Vue.component("threads-component", require("./components/Threads.vue"));
Vue.component(
    "preload-component",
    require("./components/common/PreloadComponent.vue")
);
Vue.component(
    "dropdown-locale",
    require("./components/common/navbar/DropdownLocale.vue")
);

Vue.prototype.getUrl = (url = null)=>`http://${window.location.host}/${url}`;
const app = new Vue({
    el: "#app"
});
