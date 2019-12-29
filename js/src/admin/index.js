import { extend } from 'flarum/extend';
import app from 'flarum/app';
import PassportSettingsModal from './components/PassportSettingsModal';

app.initializers.add('flagrow-passport', app => {
    console.log("ok")
    app.extensionSettings['flagrow-passport'] = () => app.modal.show(new PassportSettingsModal());
});
