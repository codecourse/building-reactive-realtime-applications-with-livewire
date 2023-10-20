import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'
import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)

Livewire.start()
