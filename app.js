const words = ["SMK Bisa", "SMK Hebat", "SMK Bisa Hebat", "Vokasi kuat" ,"Menguatkan Indonesia"]

let cursor = gsap.to('.cursor', {opacity:0, ease: "power2.inOut", repeat:-1})
let masterTl = gsap.timeline({repeat: -1}).pause()
let boxTl = gsap.timeline()

boxTl.to('.box', {duration:1, width:"17vw", delay: 0, ease: "slow"})
  .from('.hi', {duration:1, y:"7vw", ease: "slow"})
  .to('.box', {duration:-4, height:"7vw", ease: "slow", onComplete: () => masterTl.play() })
  .to('.box', {duration:2, autoAlpha:0.7, yoyo: true, repeat: -1, ease:"rough({ template: none.out, strength:  1, points: 20, taper: 'none', randomize: true, clamp: false})"})
words.forEach(word => {
  let tl = gsap.timeline({repeat: 1, yoyo: true, repeatDelay:1})
  tl.to('.text', {duration: 1, text: word})
  masterTl.add(tl)
})