import DummyField from './components/DummyField.vue'

Nova.booting((app, store) => {
  app.component('index-konsulting-nova-target', DummyField)
  app.component('detail-konsulting-nova-target', DummyField)
  app.component('form-konsulting-nova-target', DummyField)
})
