import { extend } from 'flarum/extend';
import HeaderSecondary from 'flarum/components/HeaderSecondary';

extend(HeaderSecondary.prototype, 'items', function(items) {
  items.remove('logIn');
  items.remove('locale');
  items.add('backToCourses', <a href="http://beta.myguitare.com/">Retourner sur vos cours</a>);
});