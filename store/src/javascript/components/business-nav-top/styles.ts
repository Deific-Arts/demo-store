import { css } from 'lit';

export default css`
  :host {
    background: rgb(var(--kemet-color-violet-900));
  }

  div {
    display: flex;
    padding: 1rem;
    margin: auto;
    max-width: var(--page-width);
    justify-content: space-between;
  }

  form {
    display: flex;
    gap: 0.5rem;
    padding: 0;
    margin: 0;
  }

  kemet-input {
    --kemet-input-background-color-filled: rgb(var(--kemet-color-white) / 10%);
    color: rgb(var(--kemet-color-gray-500));
  }

  kemet-input::part(input) {
    height: 100%;
  }

  kemet-button[outlined] {
    --kemet-button-color: var(--color-white);
    --kemet-button-border: 0;
  }

  @media screen and (min-width: 769px) {
    kemet-input {
      width: 212px;
    }
  }

  @media screen and (min-width: 1024px) {
    kemet-input {
      width: clamp(210px, 25vw, 480px);
    }
  }
`;
