<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Dataform\Resource;

use Google\Service\Dataform\CommitRepositoryChangesRequest;
use Google\Service\Dataform\ComputeRepositoryAccessTokenStatusResponse;
use Google\Service\Dataform\DataformEmpty;
use Google\Service\Dataform\FetchRemoteBranchesResponse;
use Google\Service\Dataform\FetchRepositoryHistoryResponse;
use Google\Service\Dataform\ListRepositoriesResponse;
use Google\Service\Dataform\Policy;
use Google\Service\Dataform\QueryRepositoryDirectoryContentsResponse;
use Google\Service\Dataform\ReadRepositoryFileResponse;
use Google\Service\Dataform\Repository;
use Google\Service\Dataform\SetIamPolicyRequest;
use Google\Service\Dataform\TestIamPermissionsRequest;
use Google\Service\Dataform\TestIamPermissionsResponse;

/**
 * The "repositories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataformService = new Google\Service\Dataform(...);
 *   $repositories = $dataformService->projects_locations_repositories;
 *  </code>
 */
class ProjectsLocationsRepositories extends \Google\Service\Resource
{
  /**
   * Applies a Git commit to a Repository. The Repository must not have a value
   * for `git_remote_settings.url`. (repositories.commit)
   *
   * @param string $name Required. The repository's name.
   * @param CommitRepositoryChangesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DataformEmpty
   */
  public function commit($name, CommitRepositoryChangesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('commit', [$params], DataformEmpty::class);
  }
  /**
   * Computes a Repository's Git access token status.
   * (repositories.computeAccessTokenStatus)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   * @return ComputeRepositoryAccessTokenStatusResponse
   */
  public function computeAccessTokenStatus($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('computeAccessTokenStatus', [$params], ComputeRepositoryAccessTokenStatusResponse::class);
  }
  /**
   * Creates a new Repository in a given project and location.
   * (repositories.create)
   *
   * @param string $parent Required. The location in which to create the
   * repository. Must be in the format `projects/locations`.
   * @param Repository $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string repositoryId Required. The ID to use for the repository,
   * which will become the final component of the repository's resource name.
   * @return Repository
   */
  public function create($parent, Repository $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Repository::class);
  }
  /**
   * Deletes a single Repository. (repositories.delete)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force If set to true, any child resources of this repository
   * will also be deleted. (Otherwise, the request will only succeed if the
   * repository has no child resources.)
   * @return DataformEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataformEmpty::class);
  }
  /**
   * Fetches a Repository's history of commits. The Repository must not have a
   * value for `git_remote_settings.url`. (repositories.fetchHistory)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of commits to return. The
   * server may return fewer items than requested. If unspecified, the server will
   * pick an appropriate default.
   * @opt_param string pageToken Optional. Page token received from a previous
   * `FetchRepositoryHistory` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `FetchRepositoryHistory`
   * must match the call that provided the page token.
   * @return FetchRepositoryHistoryResponse
   */
  public function fetchHistory($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('fetchHistory', [$params], FetchRepositoryHistoryResponse::class);
  }
  /**
   * Fetches a Repository's remote branches. (repositories.fetchRemoteBranches)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   * @return FetchRemoteBranchesResponse
   */
  public function fetchRemoteBranches($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('fetchRemoteBranches', [$params], FetchRemoteBranchesResponse::class);
  }
  /**
   * Fetches a single Repository. (repositories.get)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   * @return Repository
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Repository::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (repositories.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists Repositories in a given project and location.
   * (repositories.listProjectsLocationsRepositories)
   *
   * @param string $parent Required. The location in which to list repositories.
   * Must be in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter for the returned list.
   * @opt_param string orderBy Optional. This field only supports ordering by
   * `name`. If unspecified, the server will choose the ordering. If specified,
   * the default order is ascending for the `name` field.
   * @opt_param int pageSize Optional. Maximum number of repositories to return.
   * The server may return fewer items than requested. If unspecified, the server
   * will pick an appropriate default.
   * @opt_param string pageToken Optional. Page token received from a previous
   * `ListRepositories` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListRepositories` must match
   * the call that provided the page token.
   * @return ListRepositoriesResponse
   */
  public function listProjectsLocationsRepositories($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRepositoriesResponse::class);
  }
  /**
   * Updates a single Repository. (repositories.patch)
   *
   * @param string $name Output only. The repository's name.
   * @param Repository $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Specifies the fields to be updated in
   * the repository. If left unset, all fields will be updated.
   * @return Repository
   */
  public function patch($name, Repository $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Repository::class);
  }
  /**
   * Returns the contents of a given Repository directory. The Repository must not
   * have a value for `git_remote_settings.url`.
   * (repositories.queryDirectoryContents)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string commitSha Optional. The Commit SHA for the commit to query
   * from. If unset, the directory will be queried from HEAD.
   * @opt_param int pageSize Optional. Maximum number of paths to return. The
   * server may return fewer items than requested. If unspecified, the server will
   * pick an appropriate default.
   * @opt_param string pageToken Optional. Page token received from a previous
   * `QueryRepositoryDirectoryContents` call. Provide this to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `QueryRepositoryDirectoryContents` must match the call that provided the page
   * token.
   * @opt_param string path Optional. The directory's full path including
   * directory name, relative to root. If left unset, the root is used.
   * @return QueryRepositoryDirectoryContentsResponse
   */
  public function queryDirectoryContents($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('queryDirectoryContents', [$params], QueryRepositoryDirectoryContentsResponse::class);
  }
  /**
   * Returns the contents of a file (inside a Repository). The Repository must not
   * have a value for `git_remote_settings.url`. (repositories.readFile)
   *
   * @param string $name Required. The repository's name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string commitSha Optional. The commit SHA for the commit to read
   * from. If unset, the file will be read from HEAD.
   * @opt_param string path Required. Full file path to read including filename,
   * from repository root.
   * @return ReadRepositoryFileResponse
   */
  public function readFile($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('readFile', [$params], ReadRepositoryFileResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (repositories.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (repositories.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRepositories::class, 'Google_Service_Dataform_Resource_ProjectsLocationsRepositories');
