import { extend } from 'flarum/extend';
import HeaderSecondary from 'flarum/components/HeaderSecondary';

extend(HeaderSecondary.prototype, 'items', function(items) {
  items.remove('logIn');
  items.remove('locale');
  items.add('backToCourses', <a href="/">Accueil Communauté</a>);
});

const coursesUrl = 'https://beta.myguitare.com';
const logo = $('#home-link');
logo.attr('href', coursesUrl);
logo.click(() => {
  window.location.replace(coursesUrl);
});