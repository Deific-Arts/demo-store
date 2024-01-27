import { css } from 'lit';

export default css`
  :host {
    display: flex;
    background: rgb(var(--kemet-color-violet-900));
  }

  div {
    display: flex;
    flex: 1;
    justify-content: flex-end;
    padding: 1rem;
    margin: auto;
    max-width: var(--page-width);
  }

  form {
    display: flex;
    gap: 0.5rem;
    padding: 0;
    margin: 0;
  }

  button {
    color: rgb(var(--kemet-color-white));
    padding: 0 1rem;
    border: 0;
    background: none;
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
    div {
      width: 100%;
      flex: 0 0 auto;
      justify-content: space-between;
    }

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
