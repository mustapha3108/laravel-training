import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
 
// Register any Alpine directives, components, or plugins here...
 
Livewire.start()
AOS.init();
