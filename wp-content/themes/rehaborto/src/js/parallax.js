// Delikatna paralaksa: każdy <img data-speed="0.2"> przesuwa się względem scrolla.
// Wartość data-speed to współczynnik (0 = brak, ok. 0.1–0.3 = subtelny efekt).
//
// Dwa tryby (wybierane automatycznie):
//  - obraz zaczynający się w pierwszym ekranie (hero): na starcie widać go od samej góry,
//    podczas scrollowania delikatnie "odjeżdża" w górę, odsłaniając dolną część kadru;
//  - pozostałe: obraz przesuwa się wolniej niż strona (klasyczna paralaksa), wyśrodkowany,
//    gdy kontener jest na środku ekranu.
export function initParallax() {
  const items = [...document.querySelectorAll('img[data-speed]')].map((img) => ({
    img,
    box: img.parentElement,
    speed: parseFloat(img.dataset.speed) || 0,
    topAligned: false,
  }));
  if (!items.length) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  let ticking = false;

  // Obraz jest powiększony o zapas, żeby przesunięcie nie odsłaniało krawędzi kontenera.
  const size = () => {
    const vh = window.innerHeight;
    items.forEach((item) => {
      const { img, box, speed } = item;
      const h = box.offsetHeight;
      const docTop = box.getBoundingClientRect().top + window.scrollY;
      item.topAligned = docTop < vh * 0.5;
      if (item.topAligned) {
        // zapas tylko od dołu: do momentu, gdy kontener wyjedzie z ekranu
        const extra = Math.ceil((docTop + h) * Math.abs(speed));
        img.style.top = '0px';
        img.style.objectPosition = 'center top';
        img.style.height = `${h + extra}px`;
      } else {
        const extra = Math.ceil(((vh + h) / 2) * Math.abs(speed));
        img.style.top = `-${extra}px`;
        img.style.height = `${h + extra * 2}px`;
      }
    });
  };

  const update = () => {
    const vh = window.innerHeight;
    items.forEach(({ img, box, speed, topAligned }) => {
      const rect = box.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > vh) return;
      const y = topAligned
        ? -window.scrollY * speed
        : (rect.top + rect.height / 2 - vh / 2) * -speed;
      img.style.transform = `translate3d(0, ${y.toFixed(1)}px, 0)`;
    });
    ticking = false;
  };

  const request = () => {
    if (!ticking) { ticking = true; requestAnimationFrame(update); }
  };

  size();
  update();
  window.addEventListener('scroll', request, { passive: true });
  window.addEventListener('resize', () => { size(); request(); });
  window.addEventListener('load', () => { size(); request(); });
}
