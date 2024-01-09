import { html, LitElement } from 'lit';

class BusinessHero extends LitElement {
  static get properties() {
    return {
      large: { type: String },
      full: { type: String},
    }
  }

  firstUpdated() {
    this.setBackground();
    window.addEventListener('resize', () => this.setBackground());
  }

	render() {
		return html`<slot></slot>`;
	}

  setBackground() {
    const isDesktop = matchMedia('(min-width: 1024px)').matches;

    if (isDesktop) {
      this.style.backgroundImage = `url(${this.full})`;
    } else {
      this.style.backgroundImage = `url(${this.large})`;
    }
  }
}

customElements.get('business-hero') || customElements.define('business-hero', BusinessHero);
