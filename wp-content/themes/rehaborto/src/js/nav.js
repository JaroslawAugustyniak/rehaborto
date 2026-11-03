export function initNav() {
  const toggle = document.querySelector('[data-nav-toggle]');
  const navigation = document.querySelector('.navigation');
  const wrapper = document.querySelector('[data-header]');
  const top = document.querySelector('.top');

  // Gdy górny pasek wyjedzie poza ekran, w przyklejonym menu pokazują się logo i telefon.
  // Zmieniamy tylko widoczność/szerokość elementów w menu, nie wysokość strony (brak sprzężenia ze scrollem).
  if (wrapper && top) {
    const toggleStuck = () => {
      const stuck = window.scrollY >= top.offsetHeight;
      wrapper.classList.toggle('is-stuck', stuck);
      wrapper.querySelectorAll('.navigation__logo, .navigation__phone').forEach((el) => {
        el.tabIndex = stuck ? 0 : -1;
      });
    };
    toggleStuck();
    window.addEventListener('scroll', toggleStuck, { passive: true });
  }

  // Menu mobilne
  if (!toggle || !navigation) return;
  const setOpen = (open) => {
    navigation.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
  };
  toggle.addEventListener('click', () => setOpen(!navigation.classList.contains('is-open')));
  navigation.addEventListener('click', (e) => { if (e.target.closest('a')) setOpen(false); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') setOpen(false); });
}
