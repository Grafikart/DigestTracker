import Alpine from 'alpinejs';
import TomSelect from 'tom-select'

document.querySelectorAll('select[multiple]').forEach((select) => {
  new TomSelect(select, {
    create: true,
    createFilter: function(input) { return input.length >= 3 }
  })
})

window.Alpine = Alpine;

Alpine.start();
