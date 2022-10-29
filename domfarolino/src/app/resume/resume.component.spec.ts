/* tslint:disable:no-unused-variable */

import { By }           from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import {
  addProviders, beforeEach, beforeEachProviders,
  describe, xdescribe,
  expect, it, xit,
  async, inject
} from '@angular/core/testing';

import { ResumeComponent } from './resume.component';
import { Router } from '@angular/router';

describe('Component: Resume', () => {
  beforeEach(() => {
    addProviders([Router]);
  });

  it('should create an instance', inject([Router], (_router) => {
    // actual test
    let component = new ResumeComponent(_router);
    expect(component).toBeTruthy();
  }));
});