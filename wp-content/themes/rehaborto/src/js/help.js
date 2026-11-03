// Sekcja "W czym możemy Ci pomóc": boksy rozwijają się po najechaniu (lub fokusie/kliknięciu),
// a gdy użytkownik nie wchodzi w interakcję, rozwijają się kolejno automatycznie
// ze stałym odstępem czasu (data-interval w ms na elemencie [data-help]).
export function initHelp() {
  const root = document.querySelector('[data-help]');
  if (!root) return;

  const items = [...root.querySelectorAll('[data-help-item]')];
  const list = root.querySelector('.help__list');
  const interval = Number(root.dataset.interval) || 4500;
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  let current = -1;
  let timer = null;
  let visible = false;
  let hovering = false;

  const activate = (index) => {
    current = index;
    items.forEach((item, i) => {
      const on = i === index;
      item.classList.toggle('is-active', on);
      item.setAttribute('aria-expanded', String(on));
    });
  };

  const next = () => activate((current + 1) % items.length);

  const stop = () => { clearInterval(timer); timer = null; };
  const start = () => {
    if (reduceMotion || timer || !visible || hovering) return;
    timer = setInterval(next, interval);
  };

  items.forEach((item, i) => {
    item.addEventListener('mouseenter', () => { hovering = true; stop(); activate(i); });
    item.addEventListener('focus', () => { stop(); activate(i); });
    item.addEventListener('click', () => { activate(i); stop(); start(); }); // dotyk: odliczanie od nowa
    item.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); activate(i); }
    });
  });

  // po zjechaniu myszką z listy automat rusza dalej od bieżącego elementu
  list.addEventListener('mouseleave', () => { hovering = false; start(); });
  list.addEventListener('focusout', (e) => {
    if (!list.contains(e.relatedTarget)) start();
  });

  // automat działa tylko, gdy sekcja jest widoczna
  new IntersectionObserver(([entry]) => {
    visible = entry.isIntersecting;
    if (!visible) return stop();
    if (current === -1) activate(0);
    start();
  }, { threshold: 0.3 }).observe(root);

  activate(0);
}
