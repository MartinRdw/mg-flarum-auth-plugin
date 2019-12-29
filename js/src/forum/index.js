import { extend } from 'flarum/extend';
import HeaderSecondary from 'flarum/components/HeaderSecondary';

extend(HeaderSecondary.prototype, 'items', function(items) {
  items.remove('logIn');
});