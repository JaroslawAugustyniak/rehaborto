// Przycisk "wróć na górę": pojawia się po przewinięciu strony i płynnie przewija do początku.
export function initScrollTop() {
  const button = document.querySelector('[data-scroll-top]');
  if (!button) return;

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const onScroll = () => button.classList.toggle('is-visible', window.scrollY > 400);

  button.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
  });

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
}
