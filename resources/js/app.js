import './theme/bootstrap'
import './theme/navbar-dropdown'
import './theme/navbar-collapse'
import './theme/popover'
import TomSelect from 'tom-select'

document.querySelectorAll('select[multiple]').forEach((select) => {
  new TomSelect(select, {
    create: true,
    createFilter: function(input) { return input.length >= 3 }
  })
})
