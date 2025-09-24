import './bootstrap'

document.addEventListener("livewire:init", () => {
    Livewire.hook('component.error', ({ status, preventDefault }) => {
        if (status === 419) {
            preventDefault()
            Livewire.restart()
        }
    })
})

Alpine.data('counter', () => ({
    x: 0,
    addx() {
        this.x += 1
    },
    subx() {
        this.x -= 1
    },
    resetx(){
        this.x = 0
    },
    syncla(){
        this.$wire.count = this.x
    },
    syncal(){
        this.x = this.$wire.count
    },
    addl(){
        this.$wire.count++
    },
    addlm(){
        Livewire.dispatch('add', { key: 1 })
        //can also just put the #[On('set-count')] for increment, i just wanted to pass a variable, has to have the same name in both alpine and livewire
        //can also be done with protected listeners = ['set-count'=>'handle', ]
    },
    adds(){
        this.x++
        this.$wire.count = this.x
    },
    addb(){
        this.x++
        this.$wire.count++
    }
}))

document.addEventListener('livewire:init', () => {
    Livewire.on('post-created', () => {
        console.log('Post was created!');
        // your logic here
    })
})

Livewire.on('post-created', () => {
        console.log('Post was created twice!');
        // your logic here
    })








