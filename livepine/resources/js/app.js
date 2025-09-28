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
    Livewire.on('dis_test', (data) => {
        console.log("yo")
        let response = document.getElementById("dr")
        response.innerHTML = "dispatch received, the data is " + data.message
    })
})

document.addEventListener('livewire:init', ()=>{
    Livewire.on('user_deleted', (data)=>{
        console.log(data.id)
        document.getElementById('user '+data.id).remove()
    })

    livewire.on('user_created', (data)=>{
        console.log('craeted '+data.user)

        let d = document.createElement('div').classList.add("border-1", "border-primary", "rounded-xl", "p-4", "text-center")
        d.id = 'user ' + data.user.id
        let h = document.createElement('h3')
        h.innerText = data.user.name
        let p = document.createElement('p')
        p.innerText = data.user.email
        let b = document.createElement('button')
        b.innerText = 'delete user ' + data.user.id
        b.classList.add("btn", "btn_error")
        b.setAttribute("wire:click", `deleteuser(${data.user.id})`)

        d.appendChild(h)
        d.appendChild(p)
        d.appendChild(b)
        document.getElementById('user_container').prepend(d);

        Livewire.rescan();
    })
})










