// Zgoda na cookies: baner na dole strony, akceptacja zapisana w ciasteczku "rehaborto_consent".
// Skrypty zależne od zgody (analityka, mapy) nasłuchują zdarzenia "rehaborto:consent" (detail.analytics).
const COOKIE = 'rehaborto_consent';
const DAYS = 180;

const readChoice = () => {
  const match = document.cookie.split('; ').find((c) => c.startsWith(`${COOKIE}=`));
  return match ? match.split('=')[1] : null;
};

const saveChoice = (value) => {
  document.cookie = `${COOKIE}=${value}; max-age=${DAYS * 86400}; path=/; SameSite=Lax${location.protocol === 'https:' ? '; Secure' : ''}`;
  document.dispatchEvent(new CustomEvent('rehaborto:consent', { detail: { analytics: value === 'all' } }));
};

export function initCookies() {
  const banner = document.querySelector('[data-cookies]');
  if (!banner) return;

  const choice = readChoice();
  if (choice) {
    document.dispatchEvent(new CustomEvent('rehaborto:consent', { detail: { analytics: choice === 'all' } }));
    return;
  }

  banner.hidden = false;
  requestAnimationFrame(() => banner.classList.add('is-visible'));

  banner.addEventListener('click', (e) => {
    const button = e.target.closest('[data-cookies-choice]');
    if (!button) return;
    saveChoice(button.dataset.cookiesChoice);
    banner.classList.remove('is-visible');
    banner.addEventListener('transitionend', () => { banner.hidden = true; }, { once: true });
    setTimeout(() => { banner.hidden = true; }, 500);
  });
}
