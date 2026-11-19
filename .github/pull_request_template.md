# Pull request requirements

Please read and confirm the following requirements before submitting this pull request.

Pull requests that do not contain the requested information, contain unchecked mandatory confirmations, or appear to be unreviewed bulk-generated submissions may be closed without further review.

- Submit only one logical change per pull request.
- Explain the problem being solved and why the change is necessary.
- Reference an existing issue for larger changes, new features, broad refactorings, or other changes that have not previously been discussed with the maintainers.
- Add or update meaningful tests where applicable.
- Personally review, understand, and test every submitted change.
- Do not submit unrelated formatting changes, generated documentation changes, repository-wide mechanical edits, or unsolicited bulk refactorings.
- You remain fully responsible for all submitted content, including automated or AI-assisted changes.
- Automated or AI-assisted changes are accepted only when every change has been personally reviewed, understood, tested, and clearly justified by the submitter.

## Code quality checks (required before creating a pull request)

Before creating a pull request, you **must** run the project's code quality checks locally:

```bash
composer checkstyle:run
```

- If PHP-CS-Fixer reports coding style violations, apply the project's formatting rules using `composer phpcsfixer:run`. Review and commit the resulting changes.
- Any errors reported by PHPStan **must be fixed in the code** before submitting the pull request. Do not suppress or ignore them merely to make the checks pass.
- After resolving all reported issues, run `composer checkstyle:run` again. All checks must pass before the pull request is created.

Pull requests that fail these required checks may be returned for correction without further review.

# Description

Describe the problem and the proposed solution.

Explain why this change is necessary and provide any relevant context. List any new dependencies introduced by this change.

Related issue: #

# Type of change

Select all applicable options.

- [ ] Bug fix
- [ ] New feature
- [ ] Refactoring without functional changes
- [ ] Performance improvement
- [ ] Documentation change
- [ ] Breaking change
- [ ] Other

# Testing

Describe exactly how you tested the change.

Include the commands you ran, the relevant test cases, and any instructions required to reproduce the results.

**Test configuration**

- Operating system:
- Operating system version:
- PHP version:
- Relevant dependency versions:

# Mandatory checklist

- [ ] This pull request contains one logical change.
- [ ] I have explained why this change is necessary.
- [ ] I have personally reviewed every changed file.
- [ ] I understand the submitted code and can explain how it works.
- [ ] I have tested the change locally.
- [ ] Existing tests pass locally.
- [ ] I ran `composer checkstyle:run` locally before creating this pull request, and all checks pass.
- [ ] I fixed all PHP-CS-Fixer coding style violations (using `composer phpcsfixer:run` where necessary).
- [ ] I fixed all errors reported by PHPStan without introducing unjustified suppressions or ignores.
- [ ] My changes introduce no new warnings or static-analysis errors.
- [ ] I have added or updated meaningful tests where applicable.
- [ ] I have updated the documentation where necessary.
- [ ] I have not included unrelated formatting, generated, or mechanical changes.
- [ ] I accept full responsibility for automated or AI-assisted content contained in this pull request.

# Additional information

Add screenshots, logs, benchmark results, migration notes, compatibility considerations, or other information that may help reviewers evaluate the change.
